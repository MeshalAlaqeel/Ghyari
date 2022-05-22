<?php

namespace App\Http\Controllers;

use Stripe;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{
    public function pay( $final) {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

		$amount = $final; //price
		$amount *= 0.98;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'AED',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;
        return view('user.pay')->with(['intent' => $intent , 'price' => $final]);

    }

    public function afterPayment() {

        $items = DB::table('items')
                    ->join('cart_items', 'items.id', '=', 'cart_items.item_id')
                    ->select('items.*', 'cart_items.*')
                    ->get();
        
        DB::table('orders')->insert([
            'user_id' => session()->get('loginId'),
            'status' => 'Sent',
        ]);
        $order = DB::table('orders')->max('id');

        foreach($items as $item){
            DB::table('order_items')->insert([
                'order_id' => $order,
                'item_id' => $item->item_id,
                'quantity'=> $item->quantity,
            ]);
        }
        DB::table('cart_items')->where([
            'user_id' => session()->get('loginId'),
        ])->delete();

        return redirect('done');
    }

    public function showCheckout() {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {

                $items = DB::table('cart_items')->where('user_id' , session()->get('loginId'))
                            ->join('items', 'items.id', '=', 'cart_items.item_id')
                            ->select('items.*', 'cart_items.*')
                            ->get();
                
                $address = DB::table('address')->where('user_id', session()->get('loginId'))->first();
                if (empty($address)) {
                    return redirect()->back()->with('fail','should have address to complete checkout');
                }
                $creditCards = DB::table('credit_cards')->where([
                            'user_id'=>session()->get('loginId'),
                            ])->get();

                return view('user.checkout')->with(['items' => $items , 'address' => $address , 'creditCards' => $creditCards]);
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }
    public function showDone() {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                return view('user.done');
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }

    public function payMethod(Request $request) {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                if($request->payMethod == "cash") {
                    return $this->afterPayment();
                }elseif ($request->payMethod == "creditCard") {
                    return $this->pay($request->final);
                }
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }

}
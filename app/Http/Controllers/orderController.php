<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class orderController extends Controller
{
    





    public function showOrders () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                $orders = DB::table('orders')->where('user_id',session()->get('loginId'))->get();
                return view('user.orders')->with(['orders' => $orders]);
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }

    public function showOrderPage ($id) {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                $order = DB::table('orders')->where('id',$id)->first();
                $items = DB::table('order_items')->where('order_id' , session()->get('loginId'))
                            ->join('items', 'items.id', '=', 'ORDER_items.item_id')
                            ->select('items.*', 'order_items.*')
                            ->get();
                
                $address = DB::table('address')->where('user_id', session()->get('loginId'))->first();
                if($order)
                    return view('user.orderPage')->with(['order' => $order , 'items' => $items , 'address' => $address ]);
                else
                    return redirect('orders');
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }


}

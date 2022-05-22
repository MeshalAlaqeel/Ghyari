<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class orderController extends Controller
{
    
    public function changeStatus (Request $request) {
        
        if (strcasecmp($request->status,"sent")==0) {
            DB::table('orders')->where([
                'id' => $request->id,
            ])->update([
                'status'=>"accepted",
            ]);
            $body = "your order id= $request->id has been accepted, the shipping company will contact you";
            Mail ::send('auth.email',['body'=>$body], function($message) use ($request) {
                $message->from('tt4174117@gmail.com','Ghyari');
                $message->to($request->email,'You')
                        ->subject('Order accepted');
            });
        }elseif (strcasecmp($request->status,"accepted")==0) {
            DB::table('orders')->where([
                'id' => $request->id,
            ])->update([
                'status'=>"on delivery",
            ]);
            $body = "your order id= $request->id is on delivery, the shipping company will contact you";
            Mail ::send('auth.email',['body'=>$body], function($message) use ($request) {
                $message->from('tt4174117@gmail.com','Ghyari');
                $message->to($request->email,'You')
                        ->subject('Order on delivery');
            });
        }elseif (strcasecmp($request->status,"on delivery")==0) {
            DB::table('orders')->where([
                'id' => $request->id,
            ])->update([
                'status'=>"recieved",
            ]);
            $body = "your order id= $request->id has been recieved, thank you for using Ghyari";
            Mail ::send('auth.email',['body'=>$body], function($message) use ($request) {
                $message->from('tt4174117@gmail.com','Ghyari');
                $message->to($request->email,'You')
                        ->subject('Order recieved');
            });
        }elseif (strcasecmp($request->status,"recieved")==0) {
            return redirect('adminOrders')->with('fail','order is recieved!');
        }
        return redirect('adminOrders')->with('success','order status changed successfully');
    }
    




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
    public function showAdminOrders () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {
                $orders = DB::table('orders')
                            ->join('users', 'orders.user_id', '=', 'users.id')
                            ->select('orders.*', 'users.username', 'users.email')
                            ->get();
                return view('admin.adminOrders')->with(['orders' => $orders]);
            }else {
                return redirect('loggedin');
            }
        }else {
            return redirect('login');
        }
    }

    public function showOrderPage ($id) {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                $order = DB::table('orders')->where('id',$id)->first();
                $items = DB::table('order_items')->where('order_id' , $id)
                            ->join('items', 'items.id', '=', 'order_items.item_id')
                            ->select('items.*', 'order_items.*')
                            ->get();

                
                $last_date = $order->created_at;
                $current_date = Carbon::now()->toDateTimeString();
        
                //NUMBER DAYS BETWEEN TWO DATES CALCULATOR
                $start_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $last_date);
                $end_date = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $current_date);
                $different_days = $start_date->diffInDays($end_date);

                $address = DB::table('address')->where('user_id', session()->get('loginId'))->first();
                if($order)
                    return view('user.orderPage')->with(['order' => $order , 'items' => $items , 'address' => $address , 'return_date' => $different_days ]);
                else
                    return redirect('orders');
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }

    public function searchOrder (Request $request) { // admin search
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {
                // $orders = DB::table('orders')->get();
                $orders = DB::table('orders')
                            ->join('users', 'orders.user_id', '=', 'users.id')
                            ->select('orders.*', 'users.username', 'users.email')->where("orders.id", "LIKE", "%".$request->search."%")
                            ->get();
                if($orders->count() > 0) 
                    return view('admin.searchOrder')->with(['success'=>'Your search about "'.$request->search.'"' ,'orders'=>$orders]);
                else
                    return view('admin.searchOrder')->with(['fail'=>'No orders found about your search! "' .$request->search.'"','orders'=>$orders]);
            }else {
                return redirect('loggedin');
            }
        }else {
            return redirect('login');
        }
    }


}

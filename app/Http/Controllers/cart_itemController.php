<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cart_items;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;

class cart_itemController extends Controller
{
    public function addToCart (Request $request) {
        
        $exist = DB::table('cart_items')->where([
            'user_id'=>session()->get('loginId'),
            'item_id'=>$request->item_id,
        ])->first();
        $items = DB::table('items')->where([
            'id'=>$request->item_id,
        ])->first();
        
        if (!$exist) {
            if (($items->quantity) > 0 ) {
                $res = DB::table('cart_items')->insert([
                    'user_id' => session()->get('loginId'),
                    'item_id' => $request->item_id,
                    'quantity'=> 1,
                ]);

                if ($res) {
                    return redirect()->back()->with('success','Item added successfully');
                }else {
                    return redirect()->back()->with('fail','somehting worng');
                }
            }else {
                return redirect()->back()->with('fail','Item not available now.');
            }
            
        } else {
            return redirect()->back()->with('fail','Item already into cart!');
        }
        
    }
    public function deleteFromCart (Request $request) {

        DB::table('cart_items')->where([
            'user_id' => session()->get('loginId'),
            'item_id' => $request->id,
        ])->delete();

        return redirect()->back()->with('success','Item Deleted successfully');

    }
    public function editFromCart(Request $request) {

        $request->validate([
            'quantity'=>'required|integer|min:1',
        ]);

        $item = DB::table('cart_items')->where([
            'user_id' => session()->get('loginId'),
            'item_id' => $request->id,
        ])->first();
        $items = DB::table('items')->where([
            'id'=>$request->id,
        ])->first();
        if (strcasecmp($item->quantity, $request->quantity) == 0) {
            return redirect()->back()->with('fail','quantity is the same!!');
        }
        
        if ( ($items->quantity) > ($request->quantity) ) {
            DB::table('cart_items')->where([
                'user_id' => session()->get('loginId'),
                'item_id' => $request->id,
            ])->update([
                'quantity'=>($request->quantity),
            ]);
        }else {
            return redirect()->back()->with('fail','quantity not available.. should be less than '.($items->quantity+1).'.');
        }


        return redirect()->back()->with('success','quantity updated successfully');

    }




    
    
    
    public function showCart () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {

                $items = DB::table('cart_items')->where([
                    'user_id'=>session()->get('loginId'),
                ])->pluck('item_id')->all();
                $quantitys = DB::table('cart_items')->where([
                    'user_id'=>session()->get('loginId'),
                ])->pluck('quantity')->all();

                $cart = DB::table('items')->whereIn('id',$items )->get();
                
                return view('user.cart')->with(['items' => $cart , 'quantitys' => $quantitys]);
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }
}

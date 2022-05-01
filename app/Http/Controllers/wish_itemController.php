<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\wish_items;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class wish_itemController extends Controller
{

    public function addToWish (Request $request) {
        
        $exist = DB::table('wish_items')->where([
            'user_id'=>session()->get('loginId'),
            'item_id'=>$request->item_id,
        ])->first();
        
        if (!$exist) {
            $res = DB::table('wish_items')->insert([
                'user_id' => session()->get('loginId'),
                'item_id' => $request->item_id,
            ]);

            if ($res) {
                return redirect()->back()->with('success','Item added successfully');
            }else {
                return redirect()->back()->with('fail','somehting worng');
            }
        } else {
            return redirect()->back()->with('fail','Item already into Wishlist!');
        }
        
    }
    public function deleteFromWish (Request $request) {

        DB::table('wish_items')->where([
            'user_id' => session()->get('loginId'),
            'item_id' => $request->id,
        ])->delete();

        return redirect()->back()->with('success','Item Deleted successfully');

    }






    public function showWish () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {

                $items = DB::table('wish_items')->where([
                    'user_id'=>session()->get('loginId'),
                ])->pluck('item_id')->all();

                $wish = DB::table('items')->whereIn('id',$items )->get();
                
                return view('user.wish')->with(['items' => $wish]);
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }
}

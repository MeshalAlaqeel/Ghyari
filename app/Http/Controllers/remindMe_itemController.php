<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\wish_items;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class remindMe_itemController extends Controller
{
    public function addToRemindME (Request $request) {
        
        $exist = DB::table('remind_me_items')->where([
            'user_id'=>session()->get('loginId'),
            'item_id'=>$request->item_id,
        ])->first();
        
        if (!$exist) {
            $res = DB::table('remind_me_items')->insert([
                'user_id' => session()->get('loginId'),
                'item_id' => $request->item_id,
            ]);

            if ($res) {
                return redirect()->back()->with('success','Item added successfully');
            }else {
                return redirect()->back()->with('fail','somehting worng');
            }
        } else {
            return redirect()->back()->with('fail','Item already into Remind-Me list!');
        }
        
    }
    public function deleteFromRemindMe (Request $request) {

        DB::table('remind_me_items')->where([
            'user_id' => session()->get('loginId'),
            'item_id' => $request->id,
        ])->delete();

        return redirect()->back()->with('success','Item Deleted successfully');

    }






    public function showRemindMe () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {

                $items = DB::table('remind_me_items')->where([
                    'user_id'=>session()->get('loginId'),
                ])->pluck('item_id')->all();

                $wish = DB::table('items')->whereIn('id',$items )->get();
                
                return view('user.remindMe')->with(['items' => $wish]);
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }
}

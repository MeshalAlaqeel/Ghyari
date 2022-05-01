<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class rateController extends Controller
{
    public function addRating (Request $request) {
        
        $exist = DB::table('rates')->where([
            'user_id'=>session()->get('loginId'),
            'item_id'=>$request->item_id,
        ])->first();
        
        if (!$exist) {
            $rate = DB::table('rates')->insert([
                'user_id' => session()->get('loginId'),
                'item_id' => $request->item_id,
                'rate'=> $request->rating,
            ]);
            $avgrate = DB::table('rates')->where([
                'item_id'=>$request->item_id,
            ])->avg('rate');
            DB::table('items')->where ('id', $request->item_id)->update([
                'rate'=>$avgrate,
            ]);

            if ($rate) {
                return redirect()->back()->with('success','rating added successfully');
            }else {
                return redirect()->back()->with('fail','somehting worng');
            }
        } else {
            return redirect()->back()->with('fail','You already rate this item!');
        }
    }
}

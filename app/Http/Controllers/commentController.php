<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class commentController extends Controller
{
    public function addComment (Request $request) {
        
        $comment = DB::table('comments')->insert([
            'user_id' => session()->get('loginId'),
            'item_id' => $request->item_id,
            'comment'=> $request->comment,
        ]);

        if ($comment) {
            return redirect()->back()->with('success','Comment added successfully');
        } else {
            return redirect()->back()->with('fail','somehting worng');
        }
    }
    
    public function deleteComment (Request $request) {

        DB::table('comments')->where([
            'id' => $request->id 
        ])->delete();

        return redirect()->back()->with('success','Comment Deleted successfully');

    }
}

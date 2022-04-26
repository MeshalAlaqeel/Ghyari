<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class itemController extends Controller
{
    public function addItem (Request $request) {
        
        $request->validate([
            'name'=>'required|unique:items',
            'price'=>'required|numeric|min:0',
            'category'=>['required'],
            'quantity'=>'required|integer|min:0',
            'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category =$request->category;
        $item->quantity =$request->quantity;
        $item->image =$request->image;

        $res = $item->save();

        if ($res) {
            return redirect()->back()->with('success','Item added successfully');
        }else {
            return redirect()->back()->with('fail','somehting worng');
        }
        
    }
    public function deleteItem (Request $request) {

        DB::table('items')->where([
            'id' => $request->id 
        ])->delete();

        return redirect('items')->with('success','Item Deleted successfully');

    }









    public function showAddItem () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {
                return view('admin.addItem');
            }else {
                return redirect('loggedin');
            }
        }else {
            return redirect('login');
        }
    }
    public function showItems () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {
                $items = DB::table('items')->get();
                return view('admin.Items')->with(['items' => $items]);
            }else {
                return redirect('loggedin');
            }
        }else {
            return redirect('login');
        }
    }
    public function showItemPage ($id) {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {
                $item = DB::table('items')->where('id',$id)->first();
                if($item)
                    return view('admin.itemPage')->with(['item' => $item]);
                else
                    return redirect('Items');
            }else {
                return redirect('loggedin');
            }
        }else {
            return redirect('login');
        }
    }


}

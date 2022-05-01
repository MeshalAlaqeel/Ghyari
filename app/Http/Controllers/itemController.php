<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class itemController extends Controller
{

    public function addItem (Request $request) {
        
        $request->validate([
            'name'=>'required|unique:items',
            'price'=>'required|numeric|min:0',
            'category'=>['required'],
            'quantity'=>'required|integer|min:0',
            'image'=>'required',
        ]);

        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->category =$request->category;
        $item->quantity =$request->quantity;
        $item->image =$request->image;
        $item->rate =0;

        $res = $item->save();

        if ($res) {
            return redirect()->back()->with('success','Item added successfully');
        }else {
            return redirect()->back()->with('fail','somehting worng');
        }
        
    }
    public function editItem(Request $request) {

        $request->validate([
            'name'=>['required',Rule::unique('items')->ignore($request->itemId),] ,
            'price'=>'required|numeric|min:0',
            'category'=>['required'],
            'quantity'=>'required|integer|min:0',
            'image'=>'required',
        ]);

        $item = DB::table('items')->where('id' , $request->itemId)->first();
        if (strcasecmp($item->name, $request->name) == 0 && strcasecmp($item->price, $request->price) == 0 && strcasecmp($item->category, $request->category) == 0 
            && strcasecmp($item->quantity, $request->quantity) == 0 && strcasecmp($item->image, $request->image) == 0 ) {
            return redirect()->back()->with('fail','Information is the same!!');
        }
        
        DB::table('items')->where ('id', $request->itemId)->update([
            'name'=>($request->name),
            'price'=>($request->price),
            'category'=>($request->category),
            'quantity'=>($request->quantity),
            'image'=>($request->image)
        ]);

        return redirect()->back()->with('success','Information updated successfully');

    }
    public function deleteItem (Request $request) {

        DB::table('items')->where([
            'id' => $request->id 
        ])->delete();

        return redirect('items')->with('success','Item Deleted successfully');

    }
    public function search (Request $request) { // user search
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                $items = DB::table('items')->where("name", "LIKE", "%".$request->search."%")->get();
                
                if($items->count() > 0) 
                    return view('user.search')->with(['success'=>'Your search about "'.$request->search.'"' ,'items'=>$items]);
                else
                    return view('user.search')->with(['fail'=>'No item found about your search! "' .$request->search.'"','items'=>$items]);
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }
    public function searchItem (Request $request) { // admin search
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {
                $items = DB::table('items')->where("name", "LIKE", "%".$request->search."%")->get();
                
                if($items->count() > 0) 
                    return view('admin.adminItems')->with(['success'=>'Your search about "'.$request->search.'"' ,'items'=>$items]);
                else
                    return view('admin.adminItems')->with(['fail'=>'No item found about your search! "' .$request->search.'"','items'=>$items]);
            }else {
                return redirect('loggedin');
            }
        }else {
            return redirect('login');
        }
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
    public function showAdminItems () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {
                $items = DB::table('items')->get();
                return view('admin.adminItems')->with(['items' => $items]);
            }else {
                return redirect('loggedin');
            }
        }else {
            return redirect('login');
        }
    }
    public function showAdminItemPage ($id) {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {
                $item = DB::table('items')->where('id',$id)->first();
                $comments = DB::table('comments')->where('item_id',$id)->get();
                if($item)
                    return view('admin.adminItemPage')->with(['item' => $item , 'comments' => $comments]);
                else
                    return redirect('adminItems');
            }else {
                return redirect('loggedin');
            }
        }else {
            return redirect('login');
        }
    }
    public function showItems () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                $items = DB::table('items')->get();
                return view('user.items')->with(['items' => $items]);
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }
    public function showItemPage ($id) {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                $item = DB::table('items')->where('id',$id)->first();
                $rate = DB::table('rates')->where([
                    'user_id'=>session()->get('loginId'),
                    'item_id'=>$id,
                ])->first();
                $comments = DB::table('comments')->where([ 'item_id' => $id ])->orderBy('created_at', 'asc')->get();
                if($item)
                    return view('user.itemPage')->with(['item' => $item ,'rate' => $rate ,'comments' => $comments ]);
                else
                    return redirect('items');
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }


}

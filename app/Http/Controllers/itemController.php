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
            'company_name'=>'required',
            'chassis_number'=>'required',
            'price'=>'required|numeric|min:0',
            'category'=>['required'],
            'quantity'=>'required|integer|min:0',
            'image'=>'required',
            'description'=>'required',
        ]);

        $item = new Item;
        $item->name = $request->name;
        $item->company_name = $request->company_name;
        $item->chassis_number = $request->chassis_number;
        $item->price = $request->price;
        $item->category = $request->category;
        $item->quantity = $request->quantity;
        $item->image = $request->image;
        $item->rate = 0;
        $item->description = $request->description;

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
            'company_name'=>'required',
            'chassis_number'=>'required',
            'price'=>'required|numeric|min:0',
            'category'=>['required'],
            'quantity'=>'required|integer|min:0',
            'image'=>'required',
            'description'=>'required',
        ]);

        $item = DB::table('items')->where('id' , $request->itemId)->first();
        if (strcasecmp($item->name, $request->name) == 0 && strcasecmp($item->company_name, $request->company_name) == 0 && 
            strcasecmp($item->chassis_number, $request->chassis_number) == 0 && strcasecmp($item->price, $request->price) == 0 && 
            strcasecmp($item->category, $request->category) == 0 && strcasecmp($item->quantity, $request->quantity) == 0 && 
            strcasecmp($item->image, $request->image) == 0 && strcasecmp($item->description, $request->description) == 0) {
            return redirect()->back()->with('fail','Information is the same!!');
        }
        
        DB::table('items')->where ('id', $request->itemId)->update([
            'name'=>($request->name),
            'company_name'=>($request->company_name),
            'chassis_number'=>($request->chassis_number),
            'price'=>($request->price),
            'category'=>($request->category),
            'quantity'=>($request->quantity),
            'image'=>($request->image),
            'description'=>($request->description)
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
                $items = DB::table('items')->where("name", "LIKE", "%".$request->search."%")
                                            ->orWhere("company_name", "LIKE", "%".$request->search."%")
                                            ->orWhere("category", "LIKE", "%".$request->search."%")
                                            ->get();
                
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
    public function returnItem (Request $request) {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {

                $exist = DB::table('order_items')->where(['order_id'=>$request->id])->first();
                DB::table('returned_items')->insert([
                    'order_id'=>$exist->order_id,
                    'item_id'=>$exist->item_id,
                    'quantity'=>$exist->quantity,
                ]);

                DB::table('order_items')->where([
                    'order_id'=>$request->id,
                    'item_id'=>$exist->item_id,
                ])->delete();
                
                return redirect('orders')->with(['success'=>'Item returned successfully Shipping company will contact you']);
            }else {
                return redirect('adminIndex');
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

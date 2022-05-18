<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\credit_card;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CardVerificationRequest;

class creditCardController extends Controller
{
    
    public function addCreditCard (CardVerificationRequest $request) {

        $validatedData = $request->validated();
        
        $newCard = new credit_card;
        
        $newCard->user_id = session()->get('loginId');
        $newCard->name = $validatedData["name"];
        $newCard->number = $validatedData["card_number"];
        $newCard->expiration_month = $validatedData["expiration_month"];
        $newCard->expiration_year = $validatedData["expiration_year"];
        $newCard->cvv = $validatedData["cvc"];

        $newCard->save();

        if ($newCard) {
            return redirect()->back()->with('success','Credit Card added successfully');
        }else {
            return redirect()->back()->with('fail','somehting worng');
        }

    }
    public function deleteCreditCard(Request $request) {

        DB::table('credit_cards')->where([
            'id' => $request->id
        ])->delete();

        return redirect()->back()->with('success','Credit Card Deleted successfully');

    }






    public function showAddCreditCard () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                
                return view('user.addCreditCard');
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }
    public function showCreditCards () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {

                $cards = DB::table('credit_cards')->where('user_id',session()->get('loginId'))->get();
                
                return view('user.CreditCards')->with(['cards' => $cards]);
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }
}

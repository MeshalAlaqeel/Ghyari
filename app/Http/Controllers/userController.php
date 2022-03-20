<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    
    public function register(Request $request) {

        $request->validate([
            'email'=>'required|email|unique:users',
            'username'=>'required|unique:users',
            'password'=>'required|min:5|max:12',
            'Confirm-password'=>'required|same:password',
        ]);

        $user = new User;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = "2";
        $user->active = "1";

        $res = $user->save();

        if ($res) {
            return redirect()->back()->with('success','User added successfully');
        }else {
            return redirect()->back()->with('fail','somehting worng');
        }
        
    }

    public function login(Request $request) {
        
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = User::where('email' , $request->email)->first();
        if($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId',$user->id);
                return redirect('loggedin');
            } else {
                return redirect()->back()->with('fail','password not matched');
            }
        } else {
            return redirect()->with('fail','Email not found');
        }
    }

    public function logout() {
        
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }





    
    public function showRegister () {
        if (!Session::has('loginId')) {
            return view('register');
        }else {
            return redirect('loggedin');
        }
    }

    public function showLogin () {
        if (!Session::has('loginId')) {
            return view('login');
        }else {
            return redirect('loggedin');
        }
    }
    public function showLoggedin () {
        if (Session::has('loginId')) {
            return view('loggedin');
        }else {
            return redirect('login');
        }
    }




}

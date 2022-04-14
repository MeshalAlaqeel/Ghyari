<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
    
    public function sendResetLink (Request $request) {
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);

        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);
        $action_link = route('showResetPassword',['token'=>$token, 'email'=>$request->email]);
        $body = "We are received a request to reset the password for <b> Ghyari </b>"." account associated with ". $request->email .". You can reset your password by clicking the link below";
        Mail ::send('auth.email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request) {
            $message->from('tt4174117@gmail.com','Ghyari');
            $message->to($request->email,'You')
                    ->subject('Reset Password');
        });

        return back()->with('success' , 'We have emailed your password reset link! ');

    }

    public function resetPassword(Request $request) {

        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|min:5|max:12',
            'Confirm-password'=>'required|same:password',
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
        ])->first();
        if ($check_token) {

            User::where ('email', $request->email)->update([
                'password'=>Hash::make($request->password)
            ]);

            DB::table('password_resets')->where([
                'email' => $request->email 
            ])->delete();

            return redirect()->route('showLogin')->with('success','Password updated successfully');
        }else {
            return redirect()->back()->with('fail','Invalid token');
        }
        
    }








    
    public function showRegister () {
        if (!Session::has('loginId')) {
            return view('auth.register');
        }else {
            return redirect('loggedin');
        }
    }

    public function showLogin () {
        if (!Session::has('loginId')) {
            return view('auth.login');
        }else {
            return redirect('loggedin');
        }
    }
    
    public function showLoggedin () {
        if (Session::has('loginId')) {
            return view('user.loggedin');
        }else {
            return redirect('login');
        }
    }
    public function showForgetPassword () {
        if (!Session::has('loginId')) {
            return view('auth.forgetPassword');
        }else {
            return redirect('loggedin');
        }
    }
    public function showResetPassword (Request $request, $token = null) {
        if (!Session::has('loginId')) {
            return view('auth.resetPassword')->with(['token'=>$token,'email'=>$request->email]);
        }else {
            return redirect('loggedin');
        }
    }

    public function showEditInformation () {
        if (Session::has('loginId')) {
            return view('user.editInformation');
        }else {
            return redirect('login');
        }
    }


}

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
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class userController extends Controller
{
    
    public function register(Request $request) {

        $request->validate([
            'email'=>'required|email|unique:users',
            'username'=>'required|unique:users',
            'password'=>['required',Password::min(8)->letters()->numbers(),],
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
            return redirect('login')->with('success','User added successfully');
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
            if ($user->active == 1) {
                if (Hash::check($request->password, $user->password)) {
                    $request->session()->put('loginId',$user->id);
                    $request->session()->put('loginRole',$user->role);
                    $request->session()->put('loginName',$user->username);
                    if($user->role==1){
                        return redirect('adminIndex');
                    }else{
                        return redirect('loggedin');
                    }
                } else {
                    return redirect()->back()->with(['fail'=>'password not matched','email'=>$request->email]);
                }
            } else {
                return redirect()->back()->with('fail','Account not active');
            }
            
        } else {
            return redirect()->back()->with(['fail'=>'Email not found','email'=>$request->email]);
        }
    }

    public function logout() {
        
        if (Session::has('loginId')) {
            Session::pull('loginId');
        }
        return redirect('');
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
            'password'=>['required',Password::min(8)->letters()->numbers(),],
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
    public function editInformation(Request $request) {

        $request->validate([
            'username'=>['required',Rule::unique('users')->ignore(session()->get('loginId')),] ,
            'email'=>   ['required',Rule::unique('users')->ignore(session()->get('loginId')),] ,
            'phone_number'=>'nullable|size:10|starts_with:05',
        ]);

        $user = User::where('id' , session()->get('loginId'))->first();
        if (strcasecmp($user->username, $request->username) == 0 && strcasecmp($user->email, $request->email) == 0 && strcasecmp($user->phone_number, $request->phone_number) == 0 ) {
            return redirect()->back()->with('fail','Information is the same!!');
        }
        
        User::where ('id', session()->get('loginId'))->update([
            'username'=>($request->username),
            'email'=>($request->email),
            'phone_number'=>($request->phone_number)
        ]);

        return redirect()->back()->with('success','Information updated successfully');

    }
    public function disableAccount(Request $request) {

        User::where ('id', $request->id)->update([
            'active'=>(2)
        ]);

        return redirect('disableAccount')->with('success','Account Disabled successfully');

    }
    public function enableAccount(Request $request) {

        User::where ('id', $request->id)->update([
            'active'=>(1)
        ]);

        return redirect('disableAccount')->with('success','Account Enabled successfully');

    }
    public function deleteAccount(Request $request) {

        DB::table('users')->where([
            'email' => $request->email 
        ])->delete();
        Session::pull('loginId');
        return redirect('login')->with('success','Account Deleted successfully');

    }
    public function searchUser (Request $request) { // admin search
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {
                $users = DB::table('users')->where("username", "LIKE", "%".$request->search."%")->get();
                
                if($users->count() > 0) 
                    return view('admin.searchUser')->with(['success'=>'Your search about "'.$request->search.'"' ,'users'=>$users]);
                else
                    return view('admin.searchUser')->with(['fail'=>'No users found about your search! "' .$request->search.'"','users'=>$users]);
            }else {
                return redirect('loggedin');
            }
        }else {
            return redirect('login');
        }
    }
    public function address (Request $request) {
        
        $exist = DB::table('address')->where([
            'user_id'=>session()->get('loginId')
        ])->first();
        
        if (!$exist) {
            $address = DB::table('address')->insert([
                'user_id' => session()->get('loginId'),
                'address_name' => $request->name,
                'lat' => $request->lat,
                'lng'=> $request->lng,
            ]);
        } else {
            $address = DB::table('address')->where ('user_id', session()->get('loginId'))->update([
                'address_name' => $request->name,
                'lat' => $request->lat,
                'lng'=> $request->lng,
            ]);
        }
        if ($address) {
            return redirect()->back()->with('success','Address Saved successfully');
        }else {
            return redirect()->back()->with('fail','somehting worng');
        }
    }

    public function notification (Request $request) {

        $request->validate([
            'message'=>'required',
        ]);

        $users = DB::table('users')->where('role' , 2)->pluck('email')->all();
        $body = $request->message;

        foreach ($users as $user) {
            Mail ::send('auth.email',['body'=>$body], function($message) use ($user) {
                $message->from('tt4174117@gmail.com','Ghyari');
                $message->to($user,'You')
                        ->subject('Notification');
            });
        }
        return redirect('adminOrders')->with('success','Notification sent successfully');
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
    
    public function showHome () {

    $Featured = DB::table('items')->take(4)->get();
    $Latest = DB::table('items')->orderBy('id', 'desc')->take(4)->get();
    $HighestRated = DB::table('items')->orderBy('rate', 'desc')->first();

    return view('user.home')->with(['Featured' => $Featured , 'Latest' => $Latest ,'HighestRated' => $HighestRated ]);
}
    public function showLoggedin () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==2) {
                $Featured = DB::table('items')->take(4)->get();
                $Latest = DB::table('items')->orderBy('id', 'desc')->take(4)->get();
                $HighestRated = DB::table('items')->orderBy('rate', 'desc')->first();

                return view('user.loggedin')->with(['Featured' => $Featured , 'Latest' => $Latest ,'HighestRated' => $HighestRated ]);
            }else {
                return redirect('adminIndex');
            }
        }else {
            return redirect('login');
        }
    }
    public function showAdminIndex () {
        if (Session::has('loginId') ) {
            if (session()->get('loginRole')==1) {

                $users = DB::table('users')->where('role',2)->count();
                $items = DB::table('items')->count();
                $orders = DB::table('orders')->count();

                return view('admin.adminIndex')->with(['users' => $users , 'items' => $items ,'orders' => $orders ]);
            }else {
                return redirect('loggedin');
            }
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
        if (Session::has('loginId') && session()->get('loginRole')==2) {
            $user = User::where('id' , session()->get('loginId'))->first();
            $address = DB::table('address')->where("user_id", session()->get('loginId'))->first();
            return view('user.editInformation')->with(['user' => $user , 'address' => $address]);
        }else {
            return redirect('login');
        }
    }
    public function showEditAdminInformation () {
        if (Session::has('loginId') && session()->get('loginRole')==1) {
            $user = User::where('id' , session()->get('loginId'))->first();
            return view('admin.editAdminInformation')->with(['user' => $user]);
        }else {
            return redirect('login');
        }
    }
    public function showDisableAccount () {
        if (Session::has('loginId') && session()->get('loginRole')==1) {
            $users = DB::table('users')->where('role','2')->orderBy('active', 'asc')->get();
            return view('admin.disableAccount')->with(['users' => $users]);
        }else {
            return redirect('login');
        }
    }
    public function showNotification () {
        if (Session::has('loginId') && session()->get('loginRole')==1) {
            return view('admin.notification');
        }else {
            return redirect('login');
        }
    }
    


}

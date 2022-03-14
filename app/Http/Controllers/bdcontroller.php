<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
class bdcontroller extends Controller
{
    //
    function add(Request $req) {
        $users = new users;
        $users->neme = $req->name;
        $users->email = $req->email;
        $users->save();
        return redirect('dbb');
    }
}

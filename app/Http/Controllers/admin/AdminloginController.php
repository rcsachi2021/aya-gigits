<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AdminloginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function processLogin(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(isset($request->rememberme) && $request->rememberme == 1)
        {
            $remember = 1;
        }else{
            $remember = 0;
        }
        $login = ['email' => $request->email, 'password' => $request->password, 'user_type' => 'admin'];

        if(auth()->attempt($login,$remember))
        {
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->back()->with('message', 'Invalid Login');
        }
    }
}

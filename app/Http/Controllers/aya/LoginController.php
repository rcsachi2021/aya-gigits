<?php

namespace App\Http\Controllers\aya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function processlogin(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $remember = $request->remember;
        
        if(isset($remember) && $remember == "on")
        {
            $rememberMe = true; 
        }else{
            $rememberMe = false; 
        }

        $login = ['email' => $request->email, 'password' => $request->password];
        
        if(auth()->attempt($login,$rememberMe))
        {
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back()->with('message', 'Invalid Login');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}

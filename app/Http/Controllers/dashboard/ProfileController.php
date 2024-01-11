<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;
        $user = User::with('transactionDet')->find($userID);
        //dd($user);
        return view('dashboard.profile', compact('user'));
    }

    public function update(Request $request)
    {
        
        $user = User::where('id', auth()->user()->id)->first();
        $user -> phone = $request->phone;
        $user-> wallet_address = $request->wallet_address;
        $user -> address = $request-> address;
        $user-> password = bcrypt($request->password);
        $user->save();

        return redirect()->back()->with('message','Profile updated successfully!');
    }
    
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password'  => 'required|confirmed|min:6'
        ]);
        
        $user = User::find(auth()->user()->id);
        $user -> password = bcrypt($request->password);
        $user->update();
        
        return redirect()->back()->with('message','Password changed successfully!');
    }
}

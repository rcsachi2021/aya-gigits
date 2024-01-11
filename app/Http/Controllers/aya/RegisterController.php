<?php

namespace App\Http\Controllers\aya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\plan;
use App\Models\User;
use App\Models\UserAffiliate;
use App\Models\Transaction;

class RegisterController extends Controller
{
    public function saveUser(Request $request)
    {
       
        request()->validate(['amount'=>'required', 'total_amount' => 'required',
        'confirm'=>'required',
        'name'=>'required', 
        'email'=> 'required|email|unique:users', 
        'password' => 'required|confirmed|min:6']);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'plan' => $request->plan,
            'amount' => $request->amount,
            'password' => bcrypt($request->password),
        ]);
        $userID = md5($user->id);
        $users = User::find($user->id);
        $users->affiliate_id =  $userID;
        $users -> update();

        if($request->session()->has('affiliate'))
        {
            $affiliateID =  $request->session()->get('affiliate');
            UserAffiliate::create([
                'parent_id' => $affiliateID,
                'user_id' => $user->id
            ]);
        }

        if(isset($user->id))
        {
            $payment = Transaction::create([
                'user_id' => $user->id,
                // 'transaction_id' => md5($user->id),
                'transaction_id' => strtotime(now()),
                'plan' => $request->plan,
                'amount' => $request->amount,
                'type' => 'credit',
                'confirmation_1' => $request->confirm
            ]);
        }

        return redirect()->route('login')->with('message', 'Thank you We will activate your account once payment is confirmed. You will get a confirmation mail regarding the same');
    }


    
}

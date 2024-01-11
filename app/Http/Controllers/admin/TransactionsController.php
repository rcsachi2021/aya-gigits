<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;
use App\Models\UserBalance;
use Response;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('userdetails')->paginate(2);
        //dd($transactions);
        return view('admin.transactions', compact('transactions'));
    }

    public function changePaymentStatus(Request $request)
    {
        $transactionID  =  $request->transactionID;
        $payment_status =  $request->payment_status;
        $userID         =  $request->userID;
       

        // $user           =  User::find($userID);
        // $user->active_status = 1;
        // $user->save();
        $lastBalance  = 0.0;
        $transaction    = Transaction::find($transactionID);
        
        $transaction->payment_status = $payment_status;
        

        $amount = $transaction->amount;
        $getLastAmount = UserBalance::where('user_id',$userID)->first();
        if(!empty($getLastAmount))
        {
            $lastBalance = $getLastAmount->balance;
        }
        if($transaction->type=='credit' && $transaction->confirmation_2 == 0){
            $newAmount = $lastBalance + $amount;
        }else if($transaction->type=='debit'){
            $newAmount = $lastBalance - $amount;
        }else{
            $newAmount = $lastBalance;
        }
        $transaction->confirmation_2 = 1;
        $transaction->save();
        $newBalance = UserBalance::updateOrCreate([           
            'id'   => (isset($getLastAmount))?$getLastAmount->id:'',
        ],[
            'user_id'   => $userID,
            'balance'   => $newAmount
        ]);
        return Response::json(['success' => 1, 'message' => 'Acount Staus Changed!'], 200);

    }
}

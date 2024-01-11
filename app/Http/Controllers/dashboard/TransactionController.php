<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\UserBalance;
use Datatables;

class TransactionController extends Controller
{
    public function index()
    {
        $userID = auth()->user()->id;
        $transactions = Transaction::where('user_id',$userID)->get();
        //dd($transactions);
        return view('dashboard.transactions', compact('transactions'));
    }

    public function withdraw()
    {
        return view('dashboard.withdraw');
    }

    public function withdrawamount(Request $request)
    {
        $balanceDet = UserBalance::where('user_id', auth()->user()->id)->first();
        $balaceAmount = (!empty($balanceDet))?$balanceDet->balance:0;
        $request->validate([
            'wallet_address' => 'required',
            'amount' => 'required|numeric|max:' . $balaceAmount
        ]);

        $saveTransaction = Transaction::create([
            'transaction_id' => strtotime(now()),
            'user_id' => auth()->user()->id,
            'amount' => $request->amount,
            'type' => 'debit',
            'wallet_address' => $request->wallet_address,
            'created_at' => date('Y-m-d h:i:s'),

        ]);

        return redirect()->back()->with('message','withdrawal is successfull!');
    }
}

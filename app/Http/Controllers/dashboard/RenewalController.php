<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renewal;

class RenewalController extends Controller
{
    public function renew(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'confirm' => 'required'
        ]);

        Renewal::create([
            'user_id' => auth()->user()->id,
            'transaction_id' => md5(now()),
            'plan' => auth()->user()->plan,
            'renewal_amount' => $request->amount,
            'created_at' => date('Y-m-d'),
            'updated_at' => date('Y-m-d'),
        ]);
        return redirect()->back()->with('message', 'Thank You, You have submitted your renewal');
    }

    public function listRenewals()
    {
        $renewals = Renewal::where('user_id', auth()->user()->id)->get();
        return view('dashboard.renewals', compact('renewals'));
    }

    
}

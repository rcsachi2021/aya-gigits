<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Renewal;
use Response;


class RenewalController extends Controller
{
   public function renewals()
   {
        $renewals = Renewal::with('userdetails')->paginate(2);
        //dd($renewals);
        return view('admin.renewals', compact('renewals'));
   }

   public function changeRenewalStatus(Request $request)
    {
        $renewalID = $request-> transactionID;
        $paymentStatus = $request->payment_status;
        $renewal = Renewal::find($renewalID);
        //dd($renewal);
        $renewal->status = $paymentStatus;
        $renewal->update();
        return Response::json(['success' =>1, 'message'=> 'Renewal Approved!'], 200);
    }
}

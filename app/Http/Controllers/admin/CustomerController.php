<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Response;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::where('user_type','user')->paginate(2);
        return view('admin.customers', compact('customers'));
    }

    public function changeStatus(Request $request)
    {
        $userID         =  $request->userID;
        $account_status =  $request->account_status;
           

        $user    = User::find($userID);
        $user->active_status = $account_status;
        $user->save();
        return Response::json(['success' => 1, 'message' => 'Acount Staus Changed!'], 200);
    }
}

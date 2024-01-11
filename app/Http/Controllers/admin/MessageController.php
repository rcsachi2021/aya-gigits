<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $customers = User::where('user_type','user')->get();
        
        return view('admin.sendmessage', compact('customers'));
    }

    public function saveMessage(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'title' => 'required',
            'type' => 'required',
            'message' => 'required',
        ]);

        foreach($request->customer as $cust)
        {
            $userID = auth()->user()->id;
            $insertData = [
                'to_user' => $cust,
                'from_user' => $userID,
                'title' => $request->title,
                'type' => $request->type,
                'message' => $request->message,
                'date_created' => date('Y-m-d h:i:s'),
            ];
            Message::create($insertData);
        }
        return redirect()->back()->with('message', 'Message sent successfully!');
        
    }
}

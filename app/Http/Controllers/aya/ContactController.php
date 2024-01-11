<?php

namespace App\Http\Controllers\aya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        return view('contact');
    }
    public function saveContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone_or_email'=> 'required',
            'subject' => 'required',
            'message' => 'required',            
        ]);

        Contact::create([
            'name' => $request->name,
            'phone_or_email' => $request->phone_or_email,
            'subject' => $request->subject,
            'message' => $request->subject,
            'created_at' => date('Y-m-d h:i:s')
        ]);

        return redirect()->back()->with('message', 'Your message sent successfully!');
    }
}

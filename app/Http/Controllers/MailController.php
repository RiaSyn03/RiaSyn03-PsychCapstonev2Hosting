<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function mailsending(Request $request)
    {
        $contact_data = [
            'fullname' => $request->input('fullname'),
            'phone' => $request->input('lastname'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ];
        Mail::to('psychchare2.0@gmail.com')->send(new ContactMailable($contact_data));
        return redirect()->back()->with('status','Thank you for contact us. We will get back to asap.!');
    }
}

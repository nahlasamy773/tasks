<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;



class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }


    public function sendContactUs(Request $request)
    {

        $data = $request->validate([
            'name'=>'required|string|max:50',
            'email'=> 'required|string',
            'phone' => 'required|string',
            'subject' => 'required',
            'message' => 'required',
            ]);

            Contact::create($data);
        Mail::to ('test@gmail.com')->send(
            new ContactMail($data) );

        return "mail sent!";

    }


}

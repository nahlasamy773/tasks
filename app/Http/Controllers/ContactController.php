<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Mail; 

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }


    public function contact_mail(Request $request)
    {
        // return view('mail');
        Mail::to ('test@gmail.com')->send(new WelcomeMail($request) );
                return redirect('contact');

    }


}

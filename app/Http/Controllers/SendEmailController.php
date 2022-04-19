<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    function index() {
        return view('contact');
    }

    function send(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
        ]);

        $data = array(
            'name'      =>  $request->name,
            'mesej'   =>   $request->message,
            'email'   =>   $request->email

        );

        $input = $request->all();
        //Mail::to('cilipepperr@gmail.com')->send(new SendMail($data));
        Mail::send('email', $data, function($message) use ($request){

            $message->from($request->email);

            $message->to('cilipepperrr@gmail.com', 'Admin')->subject('New Customer Enquiry');

        });
        return back()->with('success', 'Thanks for contacting us!');

    }
}

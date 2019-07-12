<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class RequestDemoController extends Controller
{
    public function create()
    {
        return view('frontend.header');
    }
    public function index()
    {
        return view('thankyou');
    }
    public function store(Request $request)
    {
       $this->validate($request, [
           'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required'
       ]);

       Mail::send('emails.request-message', [
         'msg' => $request->message
        ], function ($mail) use($request) {
            $mail->from($request->email, $request->name);

            $mail->to('administrator@salesc2.com')->subject('Demo Request');
            $mail->to('txfreelancer62@gmail.com')->subject('Demo Request');

        });
        
    //  return redirect()->back()->with('flash_message', 'Thank you for your request');
      return view('thankyou');

    }
    
}

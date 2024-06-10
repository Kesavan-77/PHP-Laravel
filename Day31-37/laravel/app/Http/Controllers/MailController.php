<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function send(Request $request)
    {

        $email = $request->input('email');
        $email = str_replace(" ","",$email);
        $email = explode(",",$email);
        $subject = $request->input('subject');
        $message = $request->input('message');
        SendEmail::dispatch($email, $subject, $message);

        return redirect('/mail')->with('success','Sent successfully');
    }
    public function save(Request $request){
        dd($request);
    }
}


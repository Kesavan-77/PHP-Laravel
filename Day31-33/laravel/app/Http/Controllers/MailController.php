<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use TypeError;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');
        SendEmail::dispatch($email, $subject, $message);
        return view('mails.user', ["success" => 'Sent successfully']);
    }
}


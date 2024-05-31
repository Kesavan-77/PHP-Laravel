<?php
namespace App\Http\Controllers;

use App\Mail\notifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use TypeError;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');

        try {
            Mail::to($email)->send(new notifyUser($message, $subject));
        } catch(TypeError $e){
            $error = $e->getMessage();
            Log::error('Mail sending failed: ' . $error);
            return view('mails.user', ["error" => "Mail not sent(provide valid credentials)"]);
        }
        catch (\Exception $e) {
            $error = $e->getMessage();
            Log::error('Mail sending failed: ' . $error);
            return view('mails.user', ["error" => $error]);
        }

        return view('mails.user', ["success" => 'Sent successfully']);
    }
}

<?php

namespace App\Jobs;

use App\Mail\notifyUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use TypeError;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;
    protected $subject;
    protected $message;

    public function __construct($email, $subject, $message)
    {
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    public function handle()
    {
        try {
            Mail::to($this->email)->send(new notifyUser($this->message, $this->subject));
        } catch (TypeError $e) {
            $error = $e->getMessage();
            Log::error('Mail sending failed: ' . $error);
        } catch (\Exception $e) {
            $error = $e->getMessage();
            Log::error('Mail sending failed: ' . $error);
        }
    }
}

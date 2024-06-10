<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;
use App\Models\User;
use App\Notifications\EmailNotifications;

class PaymentController extends Controller
{
    protected $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function charge()
    {
        $user=User::find(4);

        $user->notify(new EmailNotifications([
            'name' => $user->name,
            'title' => 'Payment successful',
            'message' => 'You payment is debited successfully',
            'url' => 'https://laravel.com/docs/11.x/notifications#database-notifications'
        ]));

        $this->paymentGateway->charge(100); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGateway;

class PaymentController extends Controller
{
    protected $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        dd('hii');
        $this->paymentGateway = $paymentGateway;
    }

    public function charge()
    {
        $this->paymentGateway->charge(100); 
    }
}

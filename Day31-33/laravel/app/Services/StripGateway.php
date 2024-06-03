<?php

namespace App\Services;

use App\Contracts\PaymentGateway;

class StripGateway implements PaymentGateway{
    public function charge($amount=10){
        dd($amount);
        return $amount*100;
    }
}

?>
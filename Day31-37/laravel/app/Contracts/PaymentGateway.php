<?php

namespace App\Contracts;

interface PaymentGateway{
    public function charge($amount);
}

?>
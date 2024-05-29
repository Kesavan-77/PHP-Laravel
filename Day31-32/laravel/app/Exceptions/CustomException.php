<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    protected $message;
    protected $code;

    public function __construct($message = "Custom error occurred", $code = 0)
    {
        parent::__construct($message, $code);
    }

    public function report()
    {
        // Add any logging or notification logic here
        // For example, log to a custom channel
        \Log::channel('custom')->error($this->message);
    }

    public function render($request)
    {
        // Customize the response sent to the client
        return response()->json([
            'error' => $this->message,
        ], $this->code);
    }
}

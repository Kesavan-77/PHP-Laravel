<?php

namespace App\Http\Controllers;
use App\Exceptions\CustomException;
use DivisionByZeroError;

class ExceptionController extends Controller
{
    public function index()
    {
        try {
            $val = 100/0;
            throw new CustomException("Something went wrong!", 500);
        } catch (CustomException $e) {
            return $e->render(request());
        }
    }
}

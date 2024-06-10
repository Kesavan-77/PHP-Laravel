<?php

// app/Facades/MyTokenFacade.php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class MyTokenFacade extends Facade {
    
    public static function getFacadeAccessor() {
        return 'mytoken';
    }
}

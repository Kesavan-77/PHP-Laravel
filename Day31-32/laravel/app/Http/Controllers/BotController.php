<?php

namespace App\Http\Controllers;
use App\Events\BotClick;

use Illuminate\Http\Request;

class BotController extends Controller
{
   public function index(){
    return view('/botClick');
   }

   public function status(){
        event(new BotClick('on click'));

        $success = session('bot_click_success');

        return view('botClick', ['success' => $success]);
   }
}

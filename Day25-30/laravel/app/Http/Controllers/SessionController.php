<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index(){
        return view('session');
    }

    public function store(Request $request){
        Session::put('email', $request->email);
        return redirect('/gallery');
    }

}

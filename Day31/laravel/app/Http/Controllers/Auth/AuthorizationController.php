<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function index(){

        Gate::allows('isAdmin')? Response::allow(): abort(403);
        return "Welcome Admin";
        
    }
}

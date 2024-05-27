<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Models\User;

class FormController extends Controller
{
    public function index(){
        return view('formData');
    }

    public function store(ValidationRequest $request){
        // Access validated data
        dd($request->all());

        $validatedData = $request->validated();

        return "hii";
    }
}

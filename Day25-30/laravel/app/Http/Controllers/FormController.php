<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationRequest;
use App\Models\User;

class FormController extends Controller
{
    public function index(){
        return view('formData');
    }

    public function store(ValidationRequest $request){
        
        $validated = $request->validated();

        $user = User::create([
            'roll_no' => $validated['roll_no'],
            'name' =>  $validated['name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
            'age' => $validated['age']
        ]);

        return response()->json($user, 201);
    }
}

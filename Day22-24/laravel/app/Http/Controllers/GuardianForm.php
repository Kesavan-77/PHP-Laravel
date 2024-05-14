<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardian;

class GuardianForm extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $GuardianData = Guardian::with('students')->get();
        return view('home', compact('GuardianData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guardian = new Guardian;
        $guardian->name = $request->name;
        $guardian->relationship = '-';
        $guardian->contact_number = $request->contact_number;
        $guardian->email = $request->email;
        $guardian->status = $request->status;

        $guardian->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return('id: '.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


// <?php

// namespace App\Http\Controllers;

// use App\Models\Guardian;
// use App\Models\Student;

// use Illuminate\Http\Request;

// class Operations extends Controller
// {
//     public function addGuardian(Request $request)
//     {
//         $guardian = new Guardian;
//         $guardian->name = $request->name;
//         $guardian->relationship = '-';
//         $guardian->contact_number = $request->contact_number;
//         $guardian->email = $request->email;
//         $guardian->status = $request->status;

//         $guardian->save();

//         return redirect('/guardianStudent');
//     }

//     public function displayGuardianStudent()
//     {
//         $GuardianStudentData = Guardian::with('students')->get();
//         return view('/guardianStudent', compact('GuardianStudentData'));
//     }

//     public function addStudent(Request $request)
//     {
//         
//     }
// }
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guardian;
use App\Models\Student;

class StudentForm extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardianData = Guardian::with('students')->get();
        return view('student', compact('guardianData'));
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
        $student = new Student;

        $student->name = $request->name;
        $student->age = $request->age;
        $student->grade = $request->grade;
        $student->guardian_id = $request->guardianId;
        $student->status = $request->status;

        $student->save();

        Guardian::where('id', $request->guardianId)->update(['relationship' => $request->relationship]);

        return redirect('/student');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

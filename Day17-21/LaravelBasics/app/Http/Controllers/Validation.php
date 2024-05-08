<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class Validation extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $age = $request->age >= 18 ? true : false;

        Student::create([
            'name' => $request->name,
            'class' => $request->class,
            'address' => $request->address,
            'isAdult' => $age
        ]);
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $age = $request->age >= 18 ? true : false;
        Student::where('id', $request->id)
            ->update([
                'name' => $request->name,
                'class' => $request->class,
                'address' => $request->address,
                'isAdult' => $age
            ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id', $id)->delete();
        return redirect('/');
    }

    public function getData(Request $request)
    {
        $searchTerm = $request->input('search');
        $data = Student::where('name', 'like', '%' . $searchTerm . '%')->get();
        return response()->json(['message' => $data]);
    }
}

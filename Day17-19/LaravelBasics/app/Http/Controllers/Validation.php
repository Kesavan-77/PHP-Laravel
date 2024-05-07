<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Validation extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = $request->input('user-id');
        $userName = $request->input('user-name');
        $userEmail = $request->input('user-email');

        DB::table('userDetails')->insert([
            'id' => $userId,
            'name' => $userName,
            'email' => $userEmail
        ]);

        $userDetails = DB::table('userDetails')->get();

        return view('layouts/home', ['userDetails' => $userDetails]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $userId = $request->input('user-id');
        $userName = $request->input('user-name');
        $userEmail = $request->input('user-email');

        DB::table('userDetails')
            ->where('id', $userId)
            ->update([
                'name' => $userName,
                'email' => $userEmail
            ]);

        $userDetails = DB::table('userDetails')->get();

        return view('layouts/home', ['userDetails' => $userDetails]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(Request $request, $id)
    {
        $userId = $request->input('user-id');
        $userEmail = $request->input('user-email');

        DB::table('userDetails')
            ->where('id', $userId)
            ->where('email', $userEmail)
            ->delete();

        $userDetails = DB::table('userDetails')->get();

        return view('layouts/home', ['userDetails' => $userDetails]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Operations extends Controller
{
    public function AddData(Request $request)
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

    public function DeleteData(Request $request)
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

    public function UpdateData(Request $request)
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

    public function DisplayData()
    {
    }
}
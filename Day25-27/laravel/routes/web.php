<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // inser single record
    DB::table('users')->insert([
        "name"=>"bobs",
        "email"=>"bobs@gmail.com",
        "gender"=>"male",
        "age"=>20
    ]);

    // inser multiple records
    DB::table('users')->insert([
        ["name"=>"bobs","email"=>"bobs@gmail.com","gender"=>"male","age"=>20],
        ["name"=>"sobs","email"=>"sobs@gmail.com","gender"=>"male","age"=>29]
    ]);

    // read operation
    DB::table('users')->get();

    return DB::table('users')->where('age', '<', '50')->get();

    // Update a single record
    DB::table('users')->where('roll_no', 1)->update(['name' => 'Johns', 'email' => 'johns@example.com']);

    // Update multiple records with a condition
    DB::table('users')->where('age','<','10')->update(['gender' => 'male']);

    return DB::table('users')->where('age', '<', '10')->get();

    // Delete a single record
    DB::table('users')->where('roll_no', 204)->delete();

    // Delete multiple records with a condition
    DB::table('users')->where('age','>=','90')->delete();

    // Truncate the entire table
    DB::table('users')->truncate();

    return DB::table('users')->get();
});

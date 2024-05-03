<?php

use App\Http\Controllers\formValidation;
use App\Http\Controllers\Operations;
use Illuminate\Support\Facades\Route;

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
    return view('layouts/home');
});

Route::post('/add', [Operations::class, 'AddData']);

Route::post('/update', [Operations::class, 'UpdateData']);

Route::post('/delete', [Operations::class, 'DeleteData']);

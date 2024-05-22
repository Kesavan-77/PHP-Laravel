<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

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
    return view('welcome');
});

Route::get('/role',function(){
    return redirect('/');
});

Route::get('/success',function(){
    return redirect('/role');
});

Route::post('/role', function (Request $request) {
    return view('role', ['name' => $request['name']]);
})->middleware('nameAuth');

Route::post('/success', function (Request $request) {
    return view('success', ['role' => $request['role'], 'name' => $request['name']]);
})->middleware('roleAuth');


// Route::middleware(['nameAuth','roleAuth'])->group(function () {

//     Route::post('/role', function (Request $request) {
//         return view('role', ['name' => $request['name']]);
//     });

//     Route::post('/success', function (Request $request) {
//         return view('success', ['role' => $request['role'], 'name' => $request['name']]);
//     });
// });

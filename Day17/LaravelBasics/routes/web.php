<?php

use App\Http\Controllers\formValidation;
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
    return view('welcome');
});

Route::get('/home', function () {
    return view('home',["name"=>"kesavan"]);
});

Route::post('/success',[formValidation::class, 'formValidate'] );

Route::get('/feedback', function () {
    return view('feedback',["name"=>"kesavan"]);
});

Route::get('/blog', function () {
    return view('blog',["name"=>"kesavan"]);
});

Route::get('/blog/{id?}', function ($id='news0') {
    return view('blog-content',["id"=>$id,"name"=>"kesavan"]);
});

Route::get('/db', [formValidation::class, 'dbDetails']);
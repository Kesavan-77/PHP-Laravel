<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthorizationController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\ExceptionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Mail\notifyUser;
use App\Http\Controllers\ComponentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/gate',[AuthorizationController::class,'index'])->name('gate.index');

Route::get('/post',[PostController::class,'index'])->name('post.index');

Route::get('/post/{post}',[PostController::class,'show'])->name('post.show');

Route::get('/post/delete/{post}',[PostController::class,'destroy'])->name('post.destroy');

Route::get('/exception',[ExceptionController::class,'index'])->name('exception');

Route::get('/bot',[BotController::class,'index'])->name('bot.index');

Route::post('/bot',[BotController::class,'status'])->name('bot.status');

Route::view('/mail','mails.user')->name('mail');

Route::post('/sendMail',[MailController::class,'send'])->name('mail.send');

Route::get('/components',[ComponentController::class,'index'])->name('component');
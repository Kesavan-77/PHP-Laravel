<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthorizationController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\ExceptionController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Mail\notifyUser;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
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

    $arr = collect([20,30,40]);
    dd($arr->toZero());

    // class Stadium{

    // }
    // class Basketball
    // {
    //     protected $stadium = null;
    //     public function __construct(Stadium $stadium)
    //     {
    //         $this->stadium = $stadium;
    //     }
    // }
    // class game{
    //     protected $basketball = null;
    //     public function __construct(Basketball $basketball )
    //     {
    //         $this->basketball = $basketball;
    //     }
    // }

    // app()->bind('game',function(){
    //     return new game(new Basketball(new Stadium));
    // });

    
    // app()->make('game')

    //  dd(resolve('game'));

    // app()->singleton('rand',function(){
    //     return Str::random(10);
    // });

    // dump(app()->make('rand'));
    // dump(app()->make('rand'));
    // return view('welcome');

    // dd(app());

    // dd(app()->make('test'));

    // app()->make('test');

    // dd(Token::get());

    // return Token::get();

    // return view('welcome');
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

Route::post('/saveMail',[MailController::class,'save'])->name('mail.save');

Route::get('/components',[ComponentController::class,'index'])->name('component');

Route::get('/payment',[PaymentController::class,'charge']);

Route::get('/tree',function(){
    $users = DB::select('SELECT distinct pname AS Parent,GROUP_CONCAT(name) AS Children
    FROM sunflower
    GROUP BY Parent;');
    return view('tree')->with('users',$users);
    
});
<?php

use App\Models\Mark;
use App\Models\Student;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Mark::with('student')->where('student_id',23)->get();
    return Comment::with('posts')->where('post_id',1)->get();
});


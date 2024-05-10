<?php

use App\Models\Mark;
use App\Models\Student;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Employee;
use App\Models\Role;
use App\Models\UserRole;
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


    $student = Student::find(23);
    $mark = Mark::where('student_id', $student->id)->first();
    if ($mark) {
        $mark->marks = 550;
        $mark->save();
    }
    return Mark::all();

    $post = Post::select('id')->where('post_name','outing')->get();
    
    $comment = new Comment;

    $comment->post_id = $post[0]->id;
    $comment->comments = "one last dance";

    $comment->save();

    return Post::with('comments')->get();

    return Employee::with('roles')->get();
});



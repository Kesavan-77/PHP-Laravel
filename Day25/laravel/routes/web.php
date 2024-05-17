<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;

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

Route::get('/Collection/{id?}', function ($id) {

    return $id;
});

Route::get('/',function(){

    // $post_comments = Post::with('comments:post_id,comment_message')->get();

    // $result = $post_comments->map(function ($post) {
    //     return [
    //         'post_id' => $post->id,
    //         'post_name' => $post->post_name,
    //         'user_name' => $post->user_name,
    //         'comments' => $post->comments->pluck('comment_message')
    //     ];
    // });

    // return $result;

    // $comments = Comment::where('id','<','20')->with(['post'=>function($query){
    //     $query->where('id','<',10);
    // }])->get();

    // $result = [];

    // foreach($comments as $comment){
    //     array_push($result,$comment);
    // }

    // return view('welcome', compact('result'));


    $comments = Comment::all();

    $comments = $comments->load('post');

    return view('welcome',compact('comments'));
});

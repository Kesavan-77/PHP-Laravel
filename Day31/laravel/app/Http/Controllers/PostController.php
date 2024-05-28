<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use Illuminate\Auth\Middleware\Authorize;

class PostController extends Controller
{
    public function index(){

        $posts = Post::with('user')->get();

        return view('policy.index',compact('posts'));
    }

    public function show(Post $post){

        $this->authorize("view",$post);
        return view('policy.show')->with('post',$post);
    }

    public function destroy(Post $post){

        $this->authorize("delete",$post);
        $post->delete();
        return redirect()->route("post.index");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ComponentController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('components',compact('posts'));
    }
}

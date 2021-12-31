<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Return an array of posts for guests
     */
    public function welcome() {
        $posts = Post::get();
        return view('welcome',compact('posts'));
    }
}

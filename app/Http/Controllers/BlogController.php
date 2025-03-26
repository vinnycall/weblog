<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use App\Models\Post;
use Illuminate\Http\Request;



class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->get();
        return view('home', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);;
        return view('post', compact('post'));
    }
}

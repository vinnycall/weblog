<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
    
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id'=> Auth::id(),
        ]);
        return redirect()->route('myposts')->with('success', 'Post succesvol aangemaakt!');
    }
    public function myPosts(){
        $user = Auth::user();
        $posts = $user->posts;

        return view('myposts', compact('posts'));
    }
}

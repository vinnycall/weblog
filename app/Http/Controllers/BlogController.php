<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;



class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("created_at", "desc")->get();
        return view('home', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post', compact('post'));
    }

    public function store(StorePostRequest $request){

        $validated = $request->validated();
        Post::create($validated);

        return redirect()->route('myposts')->with('success', 'Post succesvol aangemaakt!');
    }
    
    public function edit(Request $request, Post $post){
        $validated = $request->validated();
        $post->edit($validated);

        return view('edit-post', compact('post'));
    }
    public function update(Request $request, Post $post){
        $validated = $request->validated();
        
        $post->update($validated);        

        return redirect()->route('myposts')->with(['success'=> 'Post updated']);
    }
    public function destroy(Post $post){
        if($post){
            $post->delete();
            return redirect()->route('myposts')->with('success','Post deleted');
        }
        return redirect()->route('myposts')->with('error','Post not deleted');

    }
    public function myPosts(){
        $user = Auth::user();
        $posts = $user->posts;

        return view('myposts', compact('posts'));
    }
    
}

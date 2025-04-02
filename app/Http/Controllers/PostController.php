<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;



class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->orderBy("created_at", "desc")->get();
        return view('home', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('post', compact('post'));
    }

    public function store(StorePostRequest $request){

        $validated = $request->validated();
        $validated['user_id'] = auth::id();
        $post = Post::create($validated);
        $post->categories()->attach($validated['categories']);
        
        return redirect()->route('myposts')->with('success', 'Post succesvol aangemaakt!');
        
    }
    public function create() {
        $categories = Category::all();
        return view('create', compact('categories'));
    }
    public function edit(Post $post){
        $categories = Category::all();
        return view('edit', compact('post', 'categories'));
    }
    public function update(UpdatePostRequest $request, Post $post){
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

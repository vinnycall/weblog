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
    public function index(Request $request)
    {
        $user = Auth::user();
        $categoryId = $request->input('category', null);
        
        $posts = Post::with('categories')
        ->when(!$user || !$user->is_premium, function ($query) {
            return $query->where('is_premium', 0);
        })
        ->when($categoryId, function ($query) use ($categoryId) {
            return $query->whereHas('categories', function ($query) use ($categoryId) {
                $query->where('category_id', $categoryId);
            });
        })
        ->orderBy("created_at", "desc")
        ->get();
       

        $categories = Category::all();
        return view('home', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        $user = Auth::user();
        
        if($post->is_premium == 1){
            if($user->is_premium == 1){
                $image = $post->image_path;
                return view('post', compact('post', 'image'));
            } else{
                return redirect()->route('premium')->with('error', 'Please subscribe to premium!');
            }
        
        }else{
            $image = $post->image_path;
            return view('post', compact('post', 'image'));
        }
    }
    public function store(StorePostRequest $request){

        $validated = $request->validated();

        $validated['user_id'] = auth::id();
        $validated['is_premium'] = $request->has('is_premium');
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $validated['image_path'] = $imageName;
        }
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
        $validated['is_premium'] = $request->has('is_premium');
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads'), $imageName);
            $validated['image_path'] = $imageName;
        }
        $post->update($validated);        
        $post->categories()->sync($validated['categories']);
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

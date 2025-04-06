<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }
    public function show(Category $category)
    {
        return view('category', compact('category'));
    }
    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        Category::create($validated);

        return redirect()->route('categories')->with('success', 'Category created successfully!');
    }
    public function edit($id) {}
    public function Update(Request $request, $id) {}
    public function destroy($id) {}
}

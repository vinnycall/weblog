<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'body' => 'required|string|max:250',
        ]);
        Comment::create([
            'post_id' => $postId,
            'user_id' => Auth::id(),
            'body' => $request->body,
        ]);
        return back()->with('success', 'Comment added!');
    }
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', 'You do not have permission to edit this comment');
        }

        return view('edit-comment', compact('comment'));
    }
    public function Update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        if (Auth::id() !== $comment->user_id) {
            return response()->json(['error' => 'You do not have the persmission to delete this comment.'], 403);
        }

        $request->validate([
            'body' => 'required|string|max:250',
        ]);

        $comment->update([
            'body' => $request->body,
        ]);

        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', 'You do not have permission to edit this comment');
        }

        return view('edit-comment', compact('comment'));
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        if (Auth::id() !== $comment->user_id) {
            return redirect()->route('home')->with('error', 'You do not have the persmission to delete this comment.');
        }

        $comment->delete();
        return back()->with('success', 'Comment deleted!');
    }
}

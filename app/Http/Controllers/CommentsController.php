<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function saveComm(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'content' => 'required|string|max:255',
        ]);
        $content = $request->get('content');
        $post = $request->get('postId');
        // Create a new comment
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post;
        $comment->content = $content;
        $comment->save();

        // Redirect back to the post or wherever you want
        return redirect()->back();
    }
}

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
    public function deleteComm(Comment $comment)
    {
        // Check if the authenticated user is the owner of the comment (or has the necessary permissions)
        if ($comment->user_id === auth()->user()->id) {
            $comment->delete();
            return response()->json(['message' => 'Comment deleted successfully']);
        } else {
            return response()->json(['message' => 'You do not have permission to delete this comment'], 403);
        }
    }
}

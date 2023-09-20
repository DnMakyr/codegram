<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
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
        $postId = $request->get('postId');
        // Create a new comment
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $postId;
        $comment->content = $content;
        $comment->save();

        // Redirect back to the post or wherever you want
        return redirect()->back();
    }
    public function deleteComm(Comment $comment)
    {
        if ($comment->user_id === auth()->user()->id ||  $comment->post->user_id === auth()->user()->id) {
            $comment->delete();
            return response()->json(['message' => 'Comment deleted successfully']);
        } else {
            return response()->json(['message' => 'You do not have permission to delete this comment'], 403);
        }
    }
    public function editComm( Request $request){
        $comment = Comment::find($request->get('commentId'));
        if ($comment->user_id === auth()->user()->id) {
            $comment->content = $request->get('newComment');
            $comment->save();
            response()->json(['message' => 'Comment edited successfully']);
            return redirect()->back();

        } else {
            return response()->json(['message' => 'You do not have permission to edit this comment'], 403);
        }
    }
}

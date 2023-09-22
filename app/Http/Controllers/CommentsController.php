<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
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
    public function editComm(Comment $comment,)
    {
        if (auth()->user()->id === $comment->user_id) {
            return view('posts.editcomment', compact('comment'));
        }
    }

    public function updateComm(Comment $comment,)
    {
        if (auth()->user()->id === $comment->user_id) {
            $data = request()->validate(
                [
                    'content' => 'required|string|max:255',
                ]
            );
            $comment->update($data);
            return redirect('/p/' . $comment->post->id)->with('success', 'Comment updated successfully');
        }
    }
}

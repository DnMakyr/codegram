<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Maize\Markable\Models\Like;

class LikeReactController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function likePost(Post $post)
    {   
        $user = auth()->user();

        // Check if the user has already liked this post
        if (!$user->hasLiked($post)) {
            // If not, like the post
            $user->like($post);
            return response()->json(['message' => 'Post liked successfully'], 200);
        }
        else {
            // If yes, remove the like
            $user->unlike($post);
            return response()->json(['message' => 'Post unliked successfully'], 200);
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use App\Models\Post;
use App\Notifications\LikeNotification;
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
            $post->user->notify(new LikeNotification($user, $post));
            broadcast(new NotificationEvent($user, $post, "like"))->toOthers();
        }
        else {
            // If yes, remove the like
            $user->unlike($post);
        }
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use Illuminate\Auth\Middleware\Authenticate;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homepage(Request $request)
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id', $users)->with('user')->with('comments')->latest()->paginate(5);
        $comments = Comment::with('user')->latest()->paginate(2);
        $suggests = User::with('profile') // Eager load the 'profile' relationship
            ->whereNotIn('id', [auth()->user()->id])
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $liked = [];

        foreach ($posts as $post) {
            $liked[$post->id] = auth()->user()->hasLiked($post);
        }

        return view('posts.index', compact('posts', 'suggests', 'comments', 'liked'));
    }
    //
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        $imagePath = (request('image')->store('uploads', 'public'));

        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);


        return redirect('/profile/' . auth()->user()->id);
    }
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}

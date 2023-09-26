<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ChatsController extends Controller
{
    //Add the below functions
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $conversations = Conversation::where('participant_1', Auth::user()->id)->orWhere('participant_2', Auth::user()->id)->get();
        // dd($friends);
        return view('chat.index', compact('conversations'));
    }

    public function createChat(User $user)
    {
        $loginUser = Auth::user();
        // $requestedUser = User::($reqUser);
        $existingConversation = Conversation::where(function ($query) use ($loginUser, $user) {
            $query->where('participant_1', $loginUser->id)->where('participant_2', $user->id);
        })->orWhere(function ($query) use ($loginUser, $user) {
            $query->where('participant_1', $user->id)->where('participant_2', $loginUser->id);
        })->first();

        if ($existingConversation) {
            return response()->json(['message' => 'Conversation already exists'], 200);
        }
        $conversation = new Conversation();
        $conversation->participant_1 = $loginUser->id;
        $conversation->participant_2 = $user->id;
        $conversation->save();

        dd($conversation);

        // return redirect()->route('chat.show', $conversation->id);
    }
}

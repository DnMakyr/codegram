<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
            return redirect()->route('chat.show', $existingConversation->id);
        }
        $conversation = new Conversation();
        $conversation->participant_1 = $loginUser->id;
        $conversation->participant_2 = $user->id;
        $conversation->save();

        return view('chat.index', compact('conversation'));
    }
    public function loadChat(Conversation $conversation)
    {
        $conversationId = $conversation->id;
        $replier = User::find($conversation->participant_2);
        $messages = Message::where('conversation_id', $conversationId)->with('user')->get();
        $conversation_id = $conversationId;
        return view('chat.show', compact('messages', 'conversation_id', 'replier'));
    }
    public function sendMessage(Request $request)
    {
        $message = new Message();
        $message->conversation_id = request('conversation_id');
        $message->sender = Auth::user()->id;
        $message->message = $request->get('message');
        $message->save();
        return redirect()->back();
    }
}

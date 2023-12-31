<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\Message as MessageEvent;

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
        if($conversation->participant_1 == Auth::user()->id){
            $replier = User::find($conversation->participant_2);
        }
        else{
            $replier = User::find($conversation->participant_1);
        }
        $messages = Message::where('conversation_id', $conversationId)->with('user')->paginate(30);
        return view('chat.show', compact('messages', 'conversationId', 'replier'));
    }
    public function sendMessage(Request $request)
    {
        $userId = Auth::user()->id;
        $conversationId = $request->conversation_id;
        $message = $request->message;
        broadcast(new MessageEvent($message, $userId, $conversationId))->toOthers();
        return view('chat.broadcast', compact('message'));
    }
    public function receiveMessage(Request $request)
    {
        return view('chat.receiver', ['message' => $request->get('message')]);
    }
}

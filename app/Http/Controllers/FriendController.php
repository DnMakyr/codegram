<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(User $user)
    {

        $sender = auth()->user();
        $receipient = User::find($user->id);
        $sender->befriend($receipient);
    }
    public function accept(User $user)
    {
        $sender = User::find($user->id);
        $receipient = auth()->user();
        $receipient->acceptFriendRequest($sender);
    }
    public function reject(User $user)
    {
        $sender = User::find($user->id);
        $receipient = auth()->user();
        $receipient->denyFriendRequest($sender);
    }

    public function unfriend(User $user)
    {
        $sender = User::find($user->id);
        $receipient = auth()->user();
        $receipient->unfriend($sender);
    }
}

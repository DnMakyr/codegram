<?php

namespace App\Http\Controllers;

use App\Events\FriendEvent;
use App\Models\User;
use App\Notifications\AcceptNotification;
use Illuminate\Http\Request;
use App\Notifications\FriendRequestNotification;

class FriendController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(User $user)
    {
        auth()->user()->befriend($user);
        $user->notify(new FriendRequestNotification(auth()->user()));
        if (!auth()->user()->following->contains($user->profile)) {
            auth()->user()->following()->toggle($user->profile);
        }
        broadcast(new FriendEvent(auth()->user(), $user, 'friend'))->toOthers();
        return redirect()->back();
    }
    public function accept(User $user)
    {
        auth()->user()->acceptFriendRequest($user);
        $user->notify(new AcceptNotification(auth()->user()));
        if (!auth()->user()->following->contains($user->profile)) {
            auth()->user()->following()->toggle($user->profile);
        }
        return redirect()->back();
    }
    public function decline(User $user)
    {
        auth()->user()->denyFriendRequest($user);
        return redirect()->back();
    }

    public function unfriend(User $user)
    {
        auth()->user()->unfriend($user);
        if (auth()->user()->following->contains($user->profile) && $user->following->contains(auth()->user()->profile)) {
            auth()->user()->following()->toggle($user->profile);
            $user->following()->toggle(auth()->user()->profile);
        }
        return redirect()->back();
    }
    public function cancel(User $user)
    {
        auth()->user()->unfriend($user);
        if (auth()->user()->following->contains($user->profile)) {
            auth()->user()->following()->toggle($user->profile);
        }
        return redirect()->back();
    }
}

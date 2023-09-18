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
        auth()->user()->befriend(($user));
        auth()->user()->following()->toggle($user->profile);
        return redirect()->back();
    }
    public function accept(User $user)
    {
        auth()->user()->acceptFriendRequest($user);
        auth()->user()->following()->toggle($user->profile);
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
        auth()->user()->following()->toggle($user->profile);
        $user->following()->toggle(auth()->user()->profile);
        return redirect()->back();
    }
    public function cancel(User $user)
    {
        auth()->user()->unfriend($user);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    //
    public function index()
    {
        // Get the currently logged-in user
        $loggedInUser = auth()->user()->id;

        // Get all users except the logged-in user
        $users = User::with('profile')
            ->whereNotIn('id', [$loggedInUser])
            ->paginate(8);

        return view('friends.explore', compact('users'));
    }
}

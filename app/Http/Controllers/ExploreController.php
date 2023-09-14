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
        $loggedInUser = auth()->user();

        // Get all users except the logged-in user
        $users = User::whereNotIn('id', [$loggedInUser->id])->get();

        return view('friends.explore', compact('users'));
    }
}

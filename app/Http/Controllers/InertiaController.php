<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InertiaController extends Controller
{
    //
    public function index()
    {
        $users = User::all();

        return Inertia::render('Welcome', [
            'users' => $users,
            'name' => 'DN',
            'frameworks' => [
                'Laravel', 'Vue', 'Inertia'
            ]
        ]);
    }

    public function getCurrentTime()
    {
        return Inertia::render('Users', [
            'time' => Carbon::now()->toTimeString(),
        ]);
    }
    public function profile(Request $request)
    {
        return Inertia::render('Profile', [
            'user' => User::find($request->id),
        ]);
    }
}

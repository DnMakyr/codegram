<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    //
    public function search(Request $request)
{
    $searchText = $request->get('searchText');
    
    // Perform a case-insensitive search on the 'username' column using COLLATE
    $results = User::where('username', 'LIKE', '%' . $searchText . '%')
                    ->orWhere('username', 'LIKE', '%' . $searchText . '% COLLATE utf8_general_ci')
                    ->with('posts')->get();
    $posts = DB::table("posts")
            ->join("users", "users.id", "=", "posts.user_id")
            ->where('username', 'LIKE', '%' . $searchText . '%')
            ->orWhere('username', 'LIKE', '%' . $searchText . '% COLLATE utf8_general_ci')->get();
    return view("search.index", compact('results', 'searchText','posts'));
}
}

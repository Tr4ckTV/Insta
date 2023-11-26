<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $users = User::where('username', 'like', "%$query%")->get();
        $posts = Post::where('body', 'like', "%$query%")->get();

        return view('search.index', compact('users', 'posts'));
    }
}



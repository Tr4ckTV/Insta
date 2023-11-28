<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


    class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $threeDaysAgo = Carbon::now()->subDays(3);

        $posts = Post::select('posts.*')
            ->withCount('likes')
            ->leftJoin('follows', function ($join) use ($user) {
                $join->on('posts.user_id', '=', 'follows.following_id')
                    ->where('follows.follower_id', $user->id);
            })
            ->leftJoin('likes', function ($join) use ($user) {
                $join->on('posts.id', '=', 'likes.post_id')
                    ->where('likes.user_id', $user->id);
            })
            ->where('posts.published_at', '>=', $threeDaysAgo)
            ->orderByRaw('
                CASE
                    WHEN follows.created_at IS NOT NULL AND likes.id IS NULL THEN 1
                    WHEN likes.id IS NOT NULL THEN 2
                    ELSE 3
                END,
                likes_count DESC
            ')
            ->paginate(8);

        return view('post.index', [
            'posts' => $posts,
        ]);
    }



    public function show($id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', [
            'post' => $post,
        ]);
    }


    public function like(Post $post)
    {
        auth()->user()->likes()->create(['post_id' => $post->id]);

        return redirect()->back();
    }

    public function unlike(Post $post)
    {
        auth()->user()->likes()->where('post_id', $post->id)->delete();

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        // Validation des données du formulaire
        $request->validate([
            'content' => 'required',
        ]);

        // Création du commentaire associé au post
        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->input('content'),
        ]);

        // Rediriger ou effectuer toute autre action nécessaire
        return redirect()->back();
    }
}

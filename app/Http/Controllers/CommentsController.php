<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{

    public function store(Post $post)
    {

        $this->validate(request(), ['body' => 'required|min:2']);


        Comment::create([

          'body' => request('body'),

          'post_id' => $post->id,

           'user_id' => auth()->id()

        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        dd($comment);
        $del = Comment::findOrFail($comment->id);

        $del->delete();

        return back()->withMessage("Comentário eliminado com sucesso!");

    }
}

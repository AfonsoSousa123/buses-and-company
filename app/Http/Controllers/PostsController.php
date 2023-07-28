<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('posts.posts-feed', compact('posts'));
    }

    public function postSearch()
    {
        $q = request('q');
        if($q != "") {
            $posts = Post::where("title", 'LIKE', '%' .$q. '%')->get();

            if(count($posts) > 0) {
                return view('posts.Posts', compact('posts'))->withDetails($posts)->withQuery($q);
            }else{
                return view('posts.Posts')->withMessage("Não foi encontrado nenhum post!");
            }
        }
    }

    public function show(Post $post)
    {
        return view('posts.show_Posts', compact('post'));

    }

    public function create()
    {
        return view('posts.create_Posts');

    }

    public function store($request)
    {
        // Create a new post using the request data
        $request->validate();

        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->id();
        // Save it to the database
        $post->save();

        // And then redirects to the home page

        return redirect('/posts')->withMessage("Post publicado com sucesso!");

    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit_Posts')->withPost($post);

    }

    public function update(Request $request, $post)
    {

        $post = Post::find($post);

        $post->title = request('title');

        $post->body = request('body');

        $post->user_id = auth()->id();

        // Upload it to the database

        $post->save();

        return redirect('/posts')->withMessage("Post editado com sucesso!");

    }

    public function destroy(Post $post)
    {

        $del = Post::findOrFail($post->id);
        $del->delete();

        return back()->withMessage("Post eliminado com sucesso!");

    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->paginate(5);
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->content = $request->content;
        $post->owner_id = auth()->id();

        $post->save();

        $posts = Post::with('author')->paginate(5);
        return view('post.index', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        //$this->authorize('update', $post);

        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {

        //$this->authorize('update', $post);

        $post->title = $request->title;
        $post->content = $request->content;

        $post->save();

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->forceDelete();

        return redirect('/');
    }
}

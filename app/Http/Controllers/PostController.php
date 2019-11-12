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

        $published_at = $request->published_at_date . ' '  . $request->published_at_hour . ':00';

        $post->published_at = $published_at;
        $post->owner_id = auth()->id();

        $post->save();

        return redirect('/');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {

        $post->title = $request->title;
        $post->content = $request->content;

        $published_at = $request->published_at_date . ' ' . $request->published_at_hour . ':00';
        $post->published_at = $published_at;

        $post->save();

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->forceDelete();

        return redirect('/');
    }
}

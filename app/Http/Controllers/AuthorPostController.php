<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class AuthorPostController extends Controller
{
    public function index(User $user)
    {
        $posts = Post::where('owner_id', $user->id)->paginate(5);
        return view('user.posts.index', ['posts' => $posts, 'user' => $user]);
    }
}

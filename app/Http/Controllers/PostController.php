<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {

        $posts = Post::with('author')->paginate(20);

        return view('posts', [
            'title' => 'Lista de posts',
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Post',
            'post' => $post
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::with('posts')->paginate(5);




//        $post = Post::with(['user' => function ($query) {
//            $query->select('id', 'firstName', 'lastName', 'email');
//        }]);

//        dd($post);

        return view('home', [
            'title' => 'Home crud',
            'users' => $users
        ]);
    }
}

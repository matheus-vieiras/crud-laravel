<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        $users = User::with('posts')->paginate(5);

//        $post = Post::with(['user' => function ($query) {
//            $query->select('id', 'firstName', 'lastName', 'email');
//        }]);

//        dd($post);

//        cache()->flush(); ### exclui todos os caches

        $users = cache()->rememberForever('users1', function () {
            return User::limit(10)->get();
        });


//        if (cache()->has('users')) {
//            $users = cache()->get('users');
//        } else {
//            $users = User::limit(10)->get();
//            cache()->put('users', $users, now()->addMinute(10));
//        }
//
//            cache()->forget('users');
//
//        dd($users);
        dd(cache()->get('users'));

        return view('home', [
            'title' => 'Home crud',
            'users' => $users
        ]);
    }
}

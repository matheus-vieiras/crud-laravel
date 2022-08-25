<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        dd(auth()->user());
        $users = User::paginate();

        return view('home', [
            'title' => 'Home crud',
            'users' => $users
        ]);
    }
}

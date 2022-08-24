<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $users = User::paginate();

//        dd($users);

        return view('home', [
            'title' => 'Home crud',
            'users' => $users
        ]);
    }
}

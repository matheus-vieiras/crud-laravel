<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login', [
            'title' => 'login'
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $validated['email'],
            'password' => $validated['password'],
            'is_admin' => 1
        ],  $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        // admin -> login ->
        // protected -> login ->

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy()
    {
        Auth::logout();

        return back();
    }
}

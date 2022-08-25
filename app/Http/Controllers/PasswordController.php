<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user->password = bcrypt($validated['password']);
        $updated = $user->save();

        ($updated) ?
            $request->session()->flash('password_success', 'Atualizado com sucesso') :
            $request->session()->flash('password_error', 'Erro ao atualizar');
        return back();
    }
}





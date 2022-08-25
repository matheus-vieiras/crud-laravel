<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = new User;
        $userFound = $user->firstOrCreate(
            ['firstName' => 'Marta'],
            [
                'lastName' => 'Fernandes',
                'email' => 'marta@gmail.com',
                'password' => bcrypt('123')
            ]
        );


        return view('user_create', [
            'title' => 'Create user'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $validated = $request->validated();

//        $saved = (new User)->create($validated);

        $saved = (new User())->insert($validated);

        ($saved) ?
            Session::flash('success', 'Cadastrado com sucesso') :
            $request->session()->flash('error', 'Erro ao cadastrar');

        return back();

    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('user_edit', [
            'title' => 'Edit user',
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users,email,' . $user->id,
        ]);
        $updated = $user->update($validated);

        if ($updated){
            $request->session()->flash('updated_success', 'Atualizado com sucesso');
        }
        else {
            $request->session()->flash('updated_error', 'Erro ao atualizar');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

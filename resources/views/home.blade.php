@extends('master')

@section('content')
    <h2>Lista de users</h2>

    <ul>
        @foreach($users as $user)
            <li>{{$user->fullName}} -
                <a href="{{route ('user.edit',[ $user->id])}}">Edit</a>

                <form action="{{route('user.destroy', $user->id)}}" method="post">

                    @csrf()
                    @method('delete')
                    <button type="submit">Deletar</button>

                </form>
            </li>
        @endforeach
    </ul>

    {{$users->links()}}
@endsection

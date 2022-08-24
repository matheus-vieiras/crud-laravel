@extends('master')

@section('content')
    <h2>Lista de users</h2>

    <ul>
        @foreach($users as $user)
            <li>{{$user->fullName}}</li>
        @endforeach
    </ul>

    {{$users->links()}}
@endsection

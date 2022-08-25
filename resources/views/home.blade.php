@extends('master')

@section('content')
    <h2>Lista de users</h2>

    <ul>
        @foreach($users as $user)
            <li>{{$user->fullName}} - <a href="{{route ('user.edit',[ $user->id])}}">Edit</a></li>
        @endforeach
    </ul>

    {{$users->links()}}
@endsection

@extends('master')

@section('content')
    <h2>Lista de users</h2>

    <ul>
        @foreach($users as $user)
            <li><a href="{{route('user.show', $user->id)}}"> {{ $user->id }} {{$user->fullName}} </a> -
                <a href="{{route ('user.edit',[ $user->id])}}">Edit</a> -
                <small>Criou {{$user->posts->count()}} posts</small>
            </li>
        @endforeach
    </ul>

    {{$users->links()}}
@endsection

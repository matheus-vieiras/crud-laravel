@extends('master')

@section('content')
    <h2>Lista de posts</h2>

    <ul>
        @foreach($posts as $post)
            <li><a href="{{route ('post', $post->slug)}}">{{$post->title}}</a> - <small>Criado por:{{$post->author->fullName}}</small>
            </li>
        @endforeach
    </ul>

    {{$posts->links()}}
@endsection

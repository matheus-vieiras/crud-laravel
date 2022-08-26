@extends('master')

@section('content')
    <h2>Lista de posts</h2>

    <ul>
        @forelse($posts as $post)
            <li><a href="{{route ('post', $post->slug)}}">{{$post->title}}</a> - <small>Criado
                    por:{{$post->author->fullName}}</small>
            </li>
            @empty
                <li>Nenhum post foi encontrado</li>
            @endforelse
    </ul>

    {{$posts->appends(['s' => request()->query('s')])->links()}}
@endsection

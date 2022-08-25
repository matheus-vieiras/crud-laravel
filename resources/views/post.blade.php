@extends('master')

@section('content')

    <h2>{{ $post->title }}</h2>

    <p>{{$post->content}}</p>

    Tags:

    @forelse($post->tags as $tag)
        <a href="{{ route('tag.show', $tag->id) }}">{{$tag->name}}</a>
    @empty
        Nenhuma tag cadastrada para esse post
    @endforelse

@endsection

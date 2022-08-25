@extends('master')

@section('content')

    <h2>{{ $tag->name }}</h2>

    <p>The purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that
        doesn't distract from the layout.</p>

    Posts:

    @forelse($tag->posts as $post)
        <a href="{{ route('post', $post->slug) }}">{{$post->title}}</a>
    @empty
        Nenhum post cadastrada para essa tag
    @endforelse

@endsection

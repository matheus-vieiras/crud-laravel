@extends('master')

@section('content')

    <h2>{{ $user->fullName}}</h2>

    <p>
        Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.
        The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of
        Cicero's De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:
    </p>

    <hr>

    @if($user->posts->count() > 0)

        <small>Posts:</small>

        <ul>
            @foreach($user->posts as $post)
                <li><a href="{{route('post', $post->slug)}}">{{$post->title}}</a></li>
            @endforeach
        </ul>

    @endif

@endsection

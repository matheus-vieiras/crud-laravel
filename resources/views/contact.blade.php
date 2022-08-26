@extends('master')

@section('content')
    <h2>Contact</h2>

    @if (session()->has('mail_success'))
        <p class="alert alert-success">{{session()->get('mail_success')}}</p>
    @elseif(session()->has('mail_error'))
        <p class="alert alert-danger">{{session()->get('mail_error')}}</p>
    @endif

    <form action="{{route('contact')}}" method="post">
        @csrf

        <input type="text" name="name" value="Matheus">
        {{$errors->first('name')}}
        <input type="text" name="email" value="matheus@fiap.com">
        {{$errors->first('email')}}
        <input type="text" name="subject" value="Assunto teste">
        {{$errors->first('subject')}}

        <textarea name="message" id="" cols="30" rows="10">Mensagem teste</textarea>
        {{$errors->first('message')}}

        <button type="submit">Enviar</button>
    </form>

@endsection

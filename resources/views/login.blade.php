@extends('master')

@section('content')

    <h2>Login</h2>

    <form action="{{route('login.store') }}" method="post">

        @csrf()

        <input type="text" name="email" value="sonia.gomes@maia.com">
        {{$errors->first('email')}}
        <input type="text" name="password" value="123">
        {{$errors->first('password')}}
        <button type="submit">Login</button>

    </form>
@endsection

@extends('master')

@section('content')

    <h2>Update user</h2>

    @if(session()->has('success'))
        <x-alert key="success" :message="session()->get('updated_success')"/>
        {{--    <p class="alert alert-success">{{session()->get('success') }}</p>--}}

    @elseif(session()->has('error'))
        <x-alert key="danger" :message="session()->get('updated_error')"/>
        {{--    <p class="alert alert-danger">{{session()->get('error') }}</p>--}}

    @endif

    <form action="{{route('user.update', $user->id)}}" method="post">

        @csrf
        @method('put')

        <label for="firstName">FirstName</label>
        <input type="text" class="form-control form-control-sm" name="firstName" placeholder="FirstName"
               value="{{$user->firstName}}">
        {{$errors->first('firstName')}}
        <label for="lastName">lastName</label>
        <input type="text" class="form-control form-control-sm" name="lastName" placeholder="lastName"
               value="{{$user->lastName}}">
        {{$errors->first('lastName')}}
        <label for="email">Email</label>
        <input type="text" class="form-control form-control-sm" name="email" placeholder="email"
               value="{{$user->email}}">
        {{$errors->first('email')}}

        <button type="submit" class="btn btn-success btn-sm">Save</button>

    </form>

@endsection

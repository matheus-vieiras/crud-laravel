@extends('master')

@section('content')

    <h2>Update user</h2>

    @if(session()->has('updated_success'))
        <x-alert key="success" :message="session()->get('updated_success')"/>
        {{--    <p class="alert alert-success">{{session()->get('success') }}</p>--}}

    @elseif(session()->has('updated_error'))
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

    <hr>

    <h2>Update password</h2>

    @if(session()->has('password_success'))
        <x-alert key="success" :message="session()->get('password_success')"/>
        {{--    <p class="alert alert-success">{{session()->get('success') }}</p>--}}

    @elseif(session()->has('password_error'))
        <x-alert key="danger" :message="session()->get('password_error')"/>
        {{--    <p class="alert alert-danger">{{session()->get('error') }}</p>--}}

    @endif


    <form action="{{route('password.update', $user->id)}}" method="post">

        @csrf
        @method('put')

        <label for="firstName">Password</label>
        <input type="text" class="form-control form-control-sm" name="password" placeholder="Password">
        {{$errors->first('password')}}
        <label for="lastName">Confirmation</label>
        <input type="text" class="form-control form-control-sm" name="password_confirmation" placeholder="Confirm password">
        {{$errors->first('password_confirmation')}}


        <button type="submit" class="btn btn-success btn-sm">Save</button>

    </form>

@endsection

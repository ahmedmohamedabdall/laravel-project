@extends('layout.layout')
@section('title','login')
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('login.chek') }}" method="post">
                @csrf
                <h3 class="text-center text-dark">login</h3>


                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">Password:</label><br>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="login">
                </div>
                <div class="text-right mt-2">
                    <a href="{{ route('register') }}" class="text-dark">register here</a>
                </div>
            </form>
        @endsection

@extends('layouts.app')
@section('tittle','login')
@section('content')
    <div class="row">
        <div class="col-md-4"></div>

        <div class="card col-md-4">
            <div class="card-body">
                <h1 class="text-center">
                    Login
                </h1>
                @if (session()->has('error_massage'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_massage') }}
                    </div>
                @endif
                <form action="{{ url('login') }}" method="POST" class="form-control">
                @csrf
                    <div class="mb-3">
                        {{-- email --}}
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">

                        {{-- password --}}
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <a href="register" type="submit" class="btn btn-success">Register</a>
            </div>
        </div>
    </div>
@endsection
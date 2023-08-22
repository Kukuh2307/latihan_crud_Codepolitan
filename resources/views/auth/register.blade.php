@extends('layouts.app')
@section('tittle','Register')
@section('content')
    <div class="row">
        <div class="col-md-4"></div>

        <div class="card col-md-4">
            <div class="card-body">
                <h1 class="text-center">
                    Register
                </h1>
                <form action="{{ url('register') }}" method="POST" class="form-control">
                @csrf
                    <div class="mb-3">
                        {{-- nama --}}
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name">

                        {{-- email --}}
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">

                        {{-- password --}}
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">

                        {{-- konfirmasi pasword --}}
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="Password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
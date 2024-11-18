@extends('auth.layouts.master')
@section('title')
    Login
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="d-flex justify-content-center">
        <div class="card p-4" style="background-color: #343a40; border: none; width: 400px; margin-top: 100px;">
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label text-light">Email</label>
                    <input type="email" class="form-control" value="{{ old('email') }}" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-light">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>  

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection



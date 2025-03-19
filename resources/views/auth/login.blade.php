@extends('layouts.app')

@section('content')
    <h1>Se connecter</h1>
    <div class="card">
        <div class="card-body">
            <form class="vstack gap-3" action="{{ route('toLogin') }}" method="post">
                @csrf
                <div class="form-control">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email">
                    @error('email')
                    <span class="alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                    @error('password')
                    <span class="alert-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection

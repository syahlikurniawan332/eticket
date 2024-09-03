@extends('layouts.app')

@section('content')

<div class="container my-5 login">
    <div class="row justify-content-center text-center mb-4">
        <h1>E-Ticketing</h1>
        <img src="{{ asset('assets/img/logo-removebg-preview.png') }}" alt="logo" class="m-0 p-0" style="height: 280px; width: 280px;">
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="row mb-3">
                    <label for="email" class="form-label">Masukkan Email:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row mb-3">
                    <label for="password" class="form-label">Masukkan Password:</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>

                <!-- Uncomment if you want to add forgot password and registration links -->
                <!-- <div class="row mt-4 text-end">
                    <a href="{{ route('password.request') }}">
                        <p>Lupa password</p>
                    </a>
                    <a href="{{ route('register') }}">
                        <p>Belum punya akun? Daftar</p>
                    </a>
                </div> -->
            </form>
        </div>
    </div>
</div>

@endsection
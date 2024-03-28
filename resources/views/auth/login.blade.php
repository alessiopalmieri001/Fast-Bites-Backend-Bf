@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('login') }}" class="d-flex justify-content-center">
        @csrf

        <div class="col-4 d-flex flex-column align-items-stretch form-style-1 text-white">
            <!-- Email Address -->
            <div class="field-input my-4">
                <label for="email">
                    Email
                </label>
                <input class="input-style-1" type="email" id="email" name="email">
            </div>

            <!-- Password -->
            <div class="field-input my-4">
                <label for="password">
                    Password
                </label>
                <input class="input-style-1" type="password" id="password" name="password">
            </div>

            <!-- Remember Me -->
            <div class="mt-4 checkbox-wrapper py-2">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>Ricordati di me</span>
                </label>
            </div>

            <div class="forgot-password text-decoration-underline">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <div class="d-flex justify-content-center button mt-3">
                <button type="submit">
                    Log in
                </button>
            </div>
        </div>
    </form>
@endsection

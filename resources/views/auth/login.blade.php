@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('login') }}" class="d-flex justify-content-center">
        @csrf

        <div class="col-4 d-flex flex-column align-items-stretch form-style-1 text-white">
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Email Address -->
            <div class="field-input my-4">
                <label for="email">
                    Email
                </label>
                <input class="input-style-1" type="email" id="email" name="email" required>
            </div>
            <span class="text-danger fw-bold" id="emailError"></span>

            <!-- Password -->
            <div class="field-input my-4">
                <label for="password">
                    Password
                </label>
                <input class="input-style-1" type="password" id="password" name="password" required>
            </div>
            <span class="text-danger fw-bold" id="emailError"></span>

            <!-- Remember Me -->
            <div class="mt-4 checkbox-wrapper py-2 d-flex align-items-center ">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember" class="form-check-input my-0 me-2">
                </label>
                <span>Ricordati di me</span>
            </div>

            <!-- Forgot Password -->
            <div class="forgot-password text-decoration-underline">
                @if (Route::has('password.request'))
                    <a class="text-white" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>

            <!-- Login Button -->
            <div class="d-flex justify-content-center button mt-3">
                <button class="button-style-1" type="submit">
                    Log in
                </button>
            </div>
        </div>
    </form>

    <!-- Script per gestire gli errori -->
    <script src="{{ asset('js/login-errors.js') }}"></script>
@endsection

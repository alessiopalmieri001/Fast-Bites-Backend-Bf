@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('register') }}" class="d-flex justify-content-center">
        @csrf

        <div class="col-4 d-flex flex-column align-items-stretch form-style-1 text-white">

            <!-- Name -->
            <div class="field-input my-4">
                <label for="name">
                    Name
                </label>
                <input class="input-style-1" type="text" id="name" name="name">
            </div>

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

            <!-- Confirm Password -->
            <div class="field-input my-4">
                <label for="password_confirmation">
                    Conferma Password
                </label>
                <input class="input-style-1" type="password" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="text-decoration-underline">
                <a href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <div class="d-flex justify-content-center button mt-3">
                <button type="submit">
                    Log in
                </button>
            </div>
        </div>
    </form>

@endsection

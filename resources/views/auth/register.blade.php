@extends('layouts.guest')

@section('main-content')
    <form id="registerForm" method="POST" action="{{ route('register') }}" class="d-flex justify-content-center">
        @csrf

        <div class="col-4 d-flex flex-column align-items-stretch form-style-1 text-white">

            <!-- Name -->
            <div class="field-input my-4">
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
                <label for="name">
                    Nome e Cognome <strong>*</strong> 
                </label>
                <input class="input-style-1" type="text" id="name" name="name" value="{{ old('name') }}">
            </div>
            <span class="text-danger fw-bold" id="nameError"></span>

            <!-- Email Address -->
            <div class="field-input my-4">
                <label for="email">
                    Email <strong>*</strong>
                </label>
                <input class="input-style-1" type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <span class="text-danger fw-bold" id="emailError"></span>

            <!-- Password -->
            <div class="field-input my-4">
                <label for="password">
                    Password <strong>*</strong> 
                </label>
                <input class="input-style-1" type="password" id="password" name="password" >
            </div>
            <span class="text-danger fw-bold" id="passwordError"></span>

            <!-- Confirm Password -->
            <div class="field-input my-4">
                <label for="password_confirmation">
                    Conferma Password <strong>*</strong> 
                </label>
                <input class="input-style-1" type="password" id="password_confirmation" name="password_confirmation">
            </div>
            <span class="text-danger fw-bold" id="passwordConfirmationError"></span>

            <div class="text-decoration-underline ">
                <a class="text-white" href="{{ route('login') }}">
                    {{ __('Hai già un account?') }}
                </a>
            </div>

            <div class="d-flex justify-content-center button mt-3">
                <button id="submitButton" class="button-style-1" type="button">
                    Register
                </button>
            </div>

        </div>
    </form>

    <script src="{{ asset('js/registration.js') }}"></script>
@endsection

@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('register') }}" class="d-flex justify-content-center">
        @csrf

        <div class="col-4 d-flex flex-column align-items-stretch form-style-1 text-white">

            <!-- Name -->
            <div class="field-input my-4">
                <label for="name">
                    Nome e Cognome <strong>*</strong>
                </label>
                <input class="input-style-1" type="text" id="name" name="name" required>
                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="field-input my-4">
                <label for="email">
                    Email <strong>*</strong>
                </label>
                <input class="input-style-1" type="email" id="email" name="email" required >
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="field-input my-4">
                <label for="password">
                    Password <strong>*</strong>
                </label>
                <input class="input-style-1" type="password" id="password" name="password" required >
            </div>

            <!-- Confirm Password -->
            <div class="field-input my-4">
                <label for="password_confirmation">
                    Conferma Password <strong>*</strong>
                </label>
                <input class="input-style-1" type="password" id="password_confirmation" name="password_confirmation" required>
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="text-decoration-underline ">
                <a class="text-white" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
            </div>

            <div class="d-flex justify-content-center button mt-3">
                <button class="button-style-1" type="submit">
                    Register
                </button>
            </div>

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
        </div>
    </form>
    
   
@endsection




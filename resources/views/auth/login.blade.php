@extends('layouts.guest')

@section('main-content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h1 class="title text-center pb-3 ">
            Effetua il Login
        </h1>

        <div class="d-flex justify-content-center">
            <div class="col-4 d-flex flex-column align-items-stretch form-style-1 text-white">
                <!-- Display Validation Errors -->
                @if ($errors->any())
                    <div class="alert-text fw-bold my-3">
                        <ul class="mb-0 list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Email Address -->
                <div class="field-input my-4">
                    <label for="email">
                        Email <strong>*</strong>
                    </label>
                    <input class="input-style-1" type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <span class="alert-text fw-bold" id="emailError"></span>
    
                <!-- Password -->
                <div class="field-input my-4">
                    <label for="password">
                        Password <strong>*</strong> 
                    </label>
                    <input class="input-style-1" type="password" id="password" name="password" >
                </div>
                <span class="alert-text fw-bold" id="passwordError"></span>
    
                <!-- Remember Me -->
                <div class="mt-4 checkbox-wrapper py-2 d-flex align-items-center ">
                    <label for="remember_me">
                        <input id="remember_me" type="checkbox" name="remember" class="form-check-input my-0 me-2">
                    </label>
                    <span>Ricordati di me</span>
                </div>
    
                <!-- Forgot Password -->
                <div class="forgot-password text-decoration-underline my-">
                    @if (Route::has('password.request'))
                        <a class="text-white" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
    
                <!-- Login Button -->
                <div class="d-flex justify-content-center mt-3">
                    <button class="button-style-3" type="submit">
                        Log in
                    </button>
                </div>
            </div>
        </div>
    </form>

    <!-- Script per gestire gli errori -->
    <script src="{{ asset('js/login-errors.js') }}"></script>
@endsection


<style lang="scss" scoped>

    .alert-text {
        color: #BC3431;
    }
    
    .title {
      font-family: 'Paytone One', sans-serif;
      font-size: 3rem;
      color: white;
      text-align: center;
      margin-bottom: 20px;
    }
    
    .subtitle {
        font-family: 'Open Sans', sans-serif;
        color: white;
        font-size: 1.5rem;
    }
    .button-style-3 {
        width: auto;
        display: inline-block;
        text-decoration: none;
        color: rgb(0, 0, 0);
        border: 1px solid transparent;
        padding: 8px 20px;
        margin: 4px 10px;
        cursor: pointer;
        border-radius: 24px;
        background-color: white;
        transition:
            background-color 0.3s ease,
            border-color 0.3s ease;
    }

    .button-style-3:hover {
        color: white;
        background-color: transparent;
        border: 1px solid white;
    }

    .button-style-3 a {
        text-decoration: none;
    }
    </style>
    
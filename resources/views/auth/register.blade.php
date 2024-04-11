@extends('layouts.guest')

@section('main-content')
    <form id="registerForm" method="POST" action="{{ route('register') }}">
        @csrf

        <h1 class="title text-center pb-3 ">
            Registrati 
        </h1>

        <div class="d-flex justify-content-center">
            <div class="col-4 d-flex flex-column align-items-stretch form-style-1 text-white">
                <!-- Name -->
                <div class="field-input my-4">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert-text fw-bold my-3">
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
                <span class="alert-text fw-bold" id="nameError"></span>
    
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
    
                <!-- Confirm Password -->
                <div class="field-input my-4">
                    <label for="password_confirmation">
                        Conferma Password <strong>*</strong> 
                    </label>
                    <input class="input-style-1" type="password" id="password_confirmation" name="password_confirmation">
                </div>
                <span class="alert-text fw-bold" id="passwordConfirmationError"></span>
    
                <div class="text-decoration-underline my-2 ">
                    <a class="text-white" href="{{ route('login') }}">
                        {{ __('Hai già un account?') }}
                    </a>
                </div>
    
                <div class="d-flex justify-content-center mt-3">
                    <button class="button-style-3" type="submit">
                        Registrati
                    </button>
                </div>
            </div>
        </div>
    </form>

    <script src="{{ asset('js/registration.js') }}"></script>
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

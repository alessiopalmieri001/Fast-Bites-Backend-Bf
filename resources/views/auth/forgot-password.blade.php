@extends('layouts.guest')

@section('main-content')

    <form method="POST" action="{{ route('password.email') }}" class="d-flex justify-content-center">
        @csrf

        <div class="col-4 d-flex flex-column align-items-stretch form-style-1 text-white">

            <div class="text-center">
                {{ __('Hai dimenticato la password? Nessun problema. Comunicaci semplicemente il tuo indirizzo e-mail e ti invieremo via e-mail un collegamento per reimpostare la password che ti consentirà di sceglierne una nuova.') }}
            </div>
        
            <!-- Email Address -->
            <div class="field-input my-4">
                <label for="email">
                    Email
                </label>
                <input class="input-style-1" type="email" id="email" name="email" required>
            </div>

            <div class="d-flex justify-content-center button mt-3">
                <button class="button-style-1" type="submit">
                    Email Password Reset Link
                </button>
            </div>
        </div>
    </form>
@endsection

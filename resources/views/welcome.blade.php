@extends('layouts.guest')

@section('main-content')
   <main>
      <div class="my-jumbotron d-flex align-items-center mb-2">
         <div class="col mx-sm-5 text-center"> <!-- Added text-center class -->
            <h1 class="title">Benvenuto in fastbites!</h1>
            <p class="subtitle fs-5">
               Gestisci ristoranti, modifica menù, monitora il tuo locale e i piatti con una dashboard intuitiva.
            </p>
            <div class="d-flex justify-content-center gap-3">
               <a href="{{ route('register') }}" class="button-style-3">
                  Registrati
               </a>
               <a href="{{ route('login') }}" class="button-style-3">
                  Accedi
               </a>
               <a href="http://localhost:5174/" class="button-style-3">
               Aquista
               </a>
            </div>
         </div>
      </div>
   </main>
@endsection

<style lang="scss" scoped>

    .my-jumbotron {
        height: 700px;
        background-image: url('/images/homepage-backend.png');
        background-size: 100% auto;
        background-position: center;
        background-repeat: no-repeat;
        object-fit: fill;


        .title {
            font-family: 'Paytone One', sans-serif;
            color: white;
            font-size: 4rem;
        }

        .subtitle {
            font-family: 'Open Sans', sans-serif;
            color: white;
            font-size: 1.5rem;
        }
    }

    @media (max-width: 992px) {
        .my-jumbotron {
         background-image: url('/images/homepage-backend-mobile.png');
            height: 700px; 
		}
    }

	.button-style-3 {
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

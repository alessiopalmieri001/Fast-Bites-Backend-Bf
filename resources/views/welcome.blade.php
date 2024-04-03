@extends('layouts.guest')

@section('main-content')
   <div class="container my-5">
      <div class="d-flex justify-content-center align-items-center">
         <div class="title-wrapper">
            <span id="title-fastbites">Fastbites</span>
            <i class="fa-solid fa-lock"id="lock-icon"></i>
         </div>
      </div>
      <p class="fs-4 my-5 text-center">Benvenuto in Fastbites! Qui puoi gestire i tuoi ristoranti, modificare i menù e monitorare l'andamento del tuo locale e dei piatti tramite una dashboard intuitiva.</p>
      <div class="buttons d-flex justify-content-center gap-3">
         <button>
            <a class="nav-link" href="{{ route('register') }}">Registrati</a>
         </button>
         <button>
            <a class="nav-link" href="{{ route('login') }}">Accedi</a>
         </button>
      </div>
   </div>
@endsection

<style lang="scss" scoped>
   #logo {
      width: 150px;
   }

   .title-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
   }

   #title-fastbites {
      color: #ffffff;
      font-size: 5rem;
      font-weight: 900;
   }

   #lock-icon {
      font-size: 3rem;
      color: #ffffff;
      margin-top: -15px;
   }
</style>

@extends('layouts.app')

@section('page-title', 'I ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">I nostri Ristoranti</h1>
            {{-- Reindirizzo l'utente alla pagina di creazione del ristorante --}}
            <div class=" mb-2 d-flex justify-content-center ">
                <a href="{{ route('admin.restaurants.create') }}" class="custom-button add">
                    + Aggiungi
                </a>
            </div>
            {{-- Per ogni ristorante stampo in pagina: img / name / indirizzo --}}
            
            @if($user && $user->restaurants)
                <div>
                    <h1>{{ $user->restaurants->name }}</h1>
                    <h2>{{ $user->restaurants->address }}</h2>
                </div>
            @else
                <div>
                    <p>Ristorante non trovato</p>
                </div>
            @endif
        </div>
    </section>
@endsection
<style>
.custom-button {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        color: black;
        text-decoration: none;
        transition: background-color 0.3s;
    }
    .custom-button.add{
        background-color: white;
    }
     .custom-button.show{
        background-color: #F28920;
        margin-right: 5px;
     }
     .custom-button.edit{
        background-color: #F28920;
     }
    .custom-button:hover {
        background-color: #dd1818e7;
    }
</style>


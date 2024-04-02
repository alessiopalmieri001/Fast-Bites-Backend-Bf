@extends('layouts.app')

@section('page-title', 'I ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">Il tuo ristorante</h1>
            {{-- Reindirizzo l'utente alla pagina di creazione del ristorante --}}
            
            {{-- Per ilristorante stampo in pagina: img / name / indirizzo --}}
            
            @if($user && $user->restaurants)
                <div class="card">
                    <div class="card-header">
                        <img src="{{ $user->restaurants->img }}" alt="{{ $user->restaurants->name }}">
                        <h1>{{ $user->restaurants->name }}</h1>
                    </div>
                    <div class="card-body">
                        <h2>{{ $user->restaurants->address }}</h2>
                    </div>
                    <div class="card-subtitle mb-2 text-muted pt-2">
                        @if (count($user->restaurants->categories) > 0)
                        <ul>
                            @foreach ($user->restaurants->categories as $category)
                                <li>{{ $category->name }}</li>
                            @endforeach
                        </ul>
                        @else
                            <p>No Types</p>
                        @endif
                    </div>
                </div>
            @else
                <div class=" mb-2 d-flex justify-content-center ">
                    <a href="{{ route('admin.restaurants.create') }}" class="custom-button add">
                        + Aggiungi
                    </a>
                </div>

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


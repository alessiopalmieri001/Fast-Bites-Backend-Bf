@extends('layouts.app')

@section('page-title', 'I ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">Il tuo ristorante</h1>
            {{-- Reindirizzo l'utente alla pagina di creazione del ristorante --}}
            
            {{-- Per ilristorante stampo in pagina: img / name / indirizzo --}}
            
            @if($user && $user->restaurants)
                <div class="card w-50 m-auto">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ $user->restaurants->img }}" alt="{{ $user->restaurants->name }}">
                    </div>
                    <div class="card-body text-center">
                        <h1>{{ $user->restaurants->name }}</h1>
                        <h2>{{ $user->restaurants->address }}</h2>
                    </div>
                    <div class="card-subtitle mb-2 text-muted pt-2">
                        @if (count($user->restaurants->categories) > 0)
                        <ul>
                            @foreach ($user->restaurants->categories as $category)
                                <li>{{ $category->name }} </li>
                            @endforeach
                        </ul>
                        @else
                            <p>No Types</p>
                        @endif
                    </div>
                    <button class="button-style-2 text-center">
                        <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->id]) }}">
                            Modifica
                        </a>
                    </button>
                </div>
                
            @else
                <div class=" mb-2 d-flex justify-content-center ">
                    <a href="{{ route('admin.restaurants.create') }}" class="button-style-2">
                        + Aggiungi
                    </a>
                </div>

                <div>
                    <p>Nessun ristorante al momento</p>
                </div>
            @endif
        </div>
    </section>
@endsection
<style>
    img {
        width: 100%;
    }
/* .custom-button {
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
    } */
</style>


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
            @foreach ($restaurants as $restaurant)
                <div class="col-md-4 container">
                    <div class="card m-1 custom-card" >
                        <div class="card-content">
                            <div class="card-img-container">
                                <img src="{{ $restaurant['img'] }}" alt="{{ $restaurant->name }}">
                            </div>
                            {{-- DETTAGLI DEL RISTORANTE --}}
                            <div class="card-details">
                                <h2>{{ $restaurant->name }}</h2>
                                <h4>{{ $restaurant->address }}</h4>
                            </div>
                            {{-- Rotta per andare allo show del ristorante --}}
                            <div class=" mb-2 d-flex justify-content-center">
                                <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id]) }}" class="custom-button show ">
                                Vedi
                            </a>
                            {{-- Rotta per modificare i dati del ristorante --}}
                            <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->id]) }}" class="custom-button edit">
                                Modifica
                            </a>

                            {{-- Bottone per eliminare il ristorante --}}
                            <form class="d-inline-block" action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo ristorante?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Elimina
                                </button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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


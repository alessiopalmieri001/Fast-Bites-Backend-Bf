@extends('layouts.app')

@section('page-title', 'I foods')

@section('main-content')
    <section>
        <div class="row d-flex justify-content-center">
            <div class="mb-2 col-4">
                <h1 class="text-center m-4 text-light">Il tuo menu</h1>
                <div class="d-flex justify-content-center"> <!-- Center the button -->
                    <a href="{{ route('admin.foods.create') }}" class="button-style-1">
                        + Aggiungi un nuovo piatto
                    </a>
                </div>
            </div>
            
            <div class="container d-flex justify-content-center flex-wrap">
                @foreach ($user->restaurants->foods as $food)
                <div class="col-md-4 container">
                    <div class="card m-1 custom-card" >
                        <div class="card-content">
                            <div class="card-img-container mb-2">
                                <div>
                                    <img src="{{ substr($food->img, 0, 4) === 'http' ? $food->img : asset('storage/' . $food->img) }}"
                                    alt="{{ $food->name }}">
                                </div>
                            </div>
                            <div class="card-details mb-2 text-center">
                                <h5>Nome: {{ $food->name }}</h5>
                                <h5>Descrizione: {{ $food->description }}</h5>
                                <h5>Prezzo: € {{ $food->price }}</h5>
                                @if ($food->availability)
                                    <i class="text-center fa-solid fa-eye my-1"></i>
                                @else
                                    <i class="text-center fa-solid fa-eye-slash my-1"></i>
                                @endif
                            </div>
                            <div class="mb-2 d-flex justify-content-center">
                                <a href="{{ route('admin.foods.edit', ['food' => $food->id]) }}" class="button-style-2">
                                    Modifica
                                </a>

                                <form onsubmit="return confirm('Are you sure you want to delete this?');"
                                    action="{{ route('admin.foods.destroy', ['food' => $food->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button-style-2">
                                        Elimina
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@extends('layouts.app')

@section('page-title', $restaurant->name)

@section('main-content')
    <section>
        <div class="row">
            <div class="mb-3">
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-success w-100">
                    Torna all'index
                </a>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="{{ $restaurant['img'] }}" alt="{{ $restaurant->name }}">
                        <h1>
                            {{ $restaurant->name}}
                        </h1>
                        <h3>
                            {{ $restaurant->address}}
                        </h3>
                        <h3>
                            {{ $restaurant->iva}}
                        </h3>
                    </div>
                </div>
            </div>
             <div class="row">
                @if ($restaurant->foods->isNotEmpty())
                    @foreach ($restaurant->foods as $food)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ $food->img }}" class="card-img-top" alt="{{ $food->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $food->name }}</h5>
                                    <p class="card-text">{{ $food->description }}</p>
                                    <p class="card-text"><strong>Prezzo:</strong> {{ $food->price }} <span>€</span> </p>
                                    <p class="card-text"><strong>Disponibilità:</strong> {{ $food->availability }}</p>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.foods.show', ['food' => $food->id]) }}" class="btn btn-primary">Vedi</a>
                                        <a href="{{ route('admin.foods.edit', ['food' => $food->id]) }}" class="btn btn-warning">Modifica</a>
                                        <form class="d-inline-block" action="{{ route('admin.foods.destroy', ['food' => $food->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo cibo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col">
                        <p>Nessun cibo disponibile per questo ristorante</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

<style lang="scss" scoped>
    .card {
        max-width: 300px;
        margin: 0 auto;
    }
    
</style>

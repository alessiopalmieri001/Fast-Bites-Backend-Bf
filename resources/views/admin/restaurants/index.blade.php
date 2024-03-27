@extends('layouts.app')

@section('page-title', 'I ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">I nostri Ristoranti</h1>
            <div class="mb-3">
                <a href="{{ route('admin.restaurants.create') }}" class="btn btn-success w-100">
                    + Aggiungi
                </a>
            </div>
            @foreach ($restaurants as $restaurant)
                <div class="col-md-4 container">
                    <div class="card m-1 custom-card" >
                        <div class="card-content">
                            <div class="card-img-container">
                                <img src="{{ $restaurant['img'] }}" alt="{{ $restaurant->name }}">
                            </div>
                            <div class="card-details">
                                <h2>{{ $restaurant->name }}</h2>
                                <h4>{{ $restaurant->address }}</h4>
                            </div>
                            <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id]) }}" class="btn btn-xs btn-primary">
                                Vedi
                            </a>
                            <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->id]) }}" class="btn btn-xs btn-warning">
                                Modifica
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
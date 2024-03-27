@extends('layouts.app')

@section('page-title', 'I ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">I nostri Ristoranti</h1>
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
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
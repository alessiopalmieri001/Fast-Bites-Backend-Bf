@extends('layouts.app')

@section('page-title', 'tutti i ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <div class="mb-3">
                <a href="{{ route('admin.restaurants.create') }}" class="btn btn-success w-100">
                    + Aggiungi
                </a>
            </div>
            @foreach ($restaurants as $restaurant)
                <div class="col-12">
                    <div class="card m-1">
                        <h1>
                            {{ $restaurant->name }}
                        </h1>
                        <h1>
                            {{ $restaurant->address }}
                        </h1>
                        <p>
                            {{ $restaurant->user_id }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
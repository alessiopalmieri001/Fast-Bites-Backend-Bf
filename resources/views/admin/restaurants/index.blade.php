@extends('layouts.app')

@section('page-title', 'tutti i ristoranti')

@section('main-content')
    <section>
        <div class="row">
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
@extends('layouts.app')

@section('page-title', 'tutti i ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-3">I nostri ristoranti</h1>
            @foreach ($restaurants as $restaurant)
                <div class="col-md-4">
                    <div class="card m-1 bg-danger-subtle">
                        <h2>
                            {{ $restaurant->name }}
                        </h2>
                        <h3>
                            {{ $restaurant->address }}
                        </h3>
                        <p>
                            {{ $restaurant->user_id }}
                        </p>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </section>


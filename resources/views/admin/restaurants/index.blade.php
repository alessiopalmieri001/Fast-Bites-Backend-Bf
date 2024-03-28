@extends('layouts.app')

@section('page-title', 'I ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">I nostri Ristoranti</h1>
            <div class=" mb-2 d-flex justify-content-center ">
                <a href="{{ route('admin.restaurants.create') }}" class="custom-button add">
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
                            <div class=" mb-2 d-flex justify-content-center">
                                <a href="{{ route('admin.restaurants.show', ['restaurant' => $restaurant->id]) }}" class="custom-button show ">
                                Vedi
                            </a>
                            <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->id]) }}" class="custom-button edit">
                                Modifica
                            </a>
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


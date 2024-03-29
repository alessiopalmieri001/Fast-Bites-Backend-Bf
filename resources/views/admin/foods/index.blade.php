@extends('layouts.app')

@section('page-title', 'I foods')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">I nostri cibi</h1>
            <div class=" mb-2 d-flex justify-content-center ">
                <a href="{{ route('admin.foods.create') }}" class="custom-button add">
                    + Aggiungi
                </a>
            </div>
            
            @foreach ($user->restaurants->foods as $food)
                <div class="col-md-4 container">
                    <div class="card m-1 custom-card" >
                        <div class="card-content">
                            <div class="card-img-container">
                                <img src="{{ $food->img }}" alt="{{ $food->name }}">
                            </div>
                            <div class="card-details">
                                <h2>{{ $food->name }}</h2>
                                <h4>{{ $food->description }}</h4>
                                <h4>{{ $food->price }}</h4>
                                @if ($food->availability)
                                    <i class="fa-solid fa-eye"></i>
                                @else
                                    <i class="fa-solid fa-eye-slash"></i>
                                @endif
                            </div>
                            <div class=" mb-2 d-flex justify-content-center">
                                <a href="{{ route('admin.foods.show', ['food' => $food->id]) }}" class="custom-button show ">
                                Vedi
                            </a>
                            <a href="{{ route('admin.foods.edit', ['food' => $food->id]) }}" class="custom-button edit">
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
    i{
        color: black;
        text-align: center;
        
    }
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


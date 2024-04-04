@extends('layouts.app')

@section('page-title', $food->name)

@section('main-content')
    <section>
        <div class="row d-flex justify-content-center">
            <div class="mb-2 col-4 text-center">
                <a href="{{ route('admin.foods.index') }}" class="button-style-1">
                    Torna all'index
                </a>
            </div>

            <div class="container d-flex justify-content-center flex-wrap">
                <div class="col-md-4 container">
                    <div class="card m-1 custom-card">
                        <div class="card-content">
                            <div class="card-img-container mb-3">
                                <div class="img-container">
                                    <img class="round-image" src="{{ substr($food->img, 0, 4) === 'http' ? $food->img : asset('storage/' . $food->img) }}"
                                        alt="{{ $food->name }}">
                                </div>
                            </div>
                            <div class="card-details mb-2">
                                <h5>Nome: {{ $food->name }}</h5>
                                <h5>Descrizione: {{ $food->description }}</h5>
                                <h5>Prezzo: € {{ $food->price }}</h5>
                                @if ($food->availability)
                                    <i class="text-center fa-solid fa-eye my-1"></i>
                                @else
                                    <i class="text-center fa-solid fa-eye-slash my-1"></i>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center">
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
            </div>
        </div>
    </section>
@endsection

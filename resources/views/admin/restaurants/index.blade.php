@extends('layouts.app')

@section('page-title', 'I ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center mb-4 text-white">Il tuo ristorante</h1>
            
            {{-- Reindirizzo l'utente alla pagina di creazione del ristorante --}}
            
            {{-- Per il ristorante stampo in pagina: img / name / indirizzo --}}
            
            @if($user && $user->restaurants)
                <div class="col-md-6 container"> 
                    <div class="card m-1 custom-card">
                        <div class="card-content">
                            <div class="d-flex flex-column align-items-center card-img-container mb-3">
                                {{-- Se i primi 4 caratteri sono 'http' allora consideralo come url, altrimenti sarà un file conservato in storage  --}}
                                <img class="round-image" src="{{ substr($user->restaurants->img, 0, 4) === 'http' ? $user->restaurants->img : asset('storage/' . $user->restaurants->img) }}" alt="{{ $user->restaurants->name }}">
                            </div>
                            <div class="card-body text-center text-dark">
                                <h1>{{ $user->restaurants->name }}</h1>
                                <h3>{{ $user->restaurants->address }}</h3>
                            </div>
                            <div class="card-subtitle text-muted">
                                @if (count($user->restaurants->categories) > 0)
                                    <ul class="d-flex justify-content-center p-0">
                                        @foreach ($user->restaurants->categories as $category)
                                            <li class="text-center category-pill">{{ $category->name }} </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>No Types</p>
                                @endif
                            </div>
                            <div class="mb-2 d-flex justify-content-center">
                                <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->id]) }}" class="button-style-2">
                                    Modifica
                                </a>

                                <form onsubmit="return confirm('Are you sure you want to delete this?');"  action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button-style-2">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-md-4 container"> 
                    <div class="text-center">
                        <a href="{{ route('admin.restaurants.create') }}" class="button-style-2 mb-3">
                            + Aggiungi
                        </a>
                        <div class="text-center">
                            <p>Nessun ristorante al momento</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

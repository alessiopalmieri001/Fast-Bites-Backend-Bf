@extends('layouts.app')

@section('page-title', 'I ristoranti')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center mb-4 title">Il tuo ristorante</h1>
            
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
                                <h1 class="restaurant-name">{{ $user->restaurants->name }}</h1>
                                <h3 class="restaurant-address">{{ $user->restaurants->address }}</h3>
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

                                <form id="deleteForm" class="m-0" action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="showConfirmationMessage()" class="button-style-2">
                                        Elimina
                                    </button>
                                </form>

                                <a href="{{ route('admin.foods.index') }}" class="button-style-2">
                                    Menù
                                </a>
                                
                                <!-- Aggiungi un div per il messaggio di conferma personalizzato -->
                                <div id="confirmationMessage" class="confirmation-message" style="display: none;">
                                    <div class="confirmation-message-content">
                                        <h3>Sei sicuro di voler eliminare questo elemento?</h3>
                                        <button onclick="confirmDelete()" class="button-style-2">Conferma</button>
                                        <button onclick="hideConfirmationMessage()" class="button-style-2">Annulla</button>
                                    </div>
                                </div>
                                
                                <script src="{{ asset('js/confirmation.js') }}"></script>
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


<style lang="scss" scoped>

.title {
        font-family: 'Paytone One', sans-serif;
        font-size: 3rem;
        color: white;
        text-align: center;
        margin-bottom: 20px;
    }
    .restaurant-name {
        font-weight: 700;
    }

    .restaurant-address {
        font-size: 25px;
    }
    .confirmation-message {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 30%;
        margin: 0 auto;
        border-radius: 20px;
        background-color: rgba(0, 0, 0, 0.701); /* Trasparenza per sfondo scuro */
        z-index: 9999; /* Livello superiore */
    }

    .confirmation-message-content {
        padding: 20px;
        text-align: center;
    }
</style>

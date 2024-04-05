@extends('layouts.app')

@section('page-title', 'I foods')

@section('main-content')
    <section>
        <div class="row d-flex justify-content-center">
            <div class="mb-2 col-4">
                <h1 class="text-center m-4 text-light">Il tuo menu</h1>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.foods.create') }}" class="button-style-1">
                        + Aggiungi un nuovo piatto
                    </a>
                </div>
            </div>
            
            <div class="container d-flex justify-content-center flex-wrap">
                @foreach ($user->restaurants->foods as $food)
                <div class="col-md-4 container">
                    <div class="card m-1 custom-card" >
                        <div class="card-content">
                            <div class="card-img-container mb-3">
                                {{-- Se i primi 4 caratteri sono 'http' allora consideralo come url, altrimenti sarà un file conservato in storage  --}}
                                <img src="{{ substr($food->img, 0, 4) === 'http' ? $food->img : asset('storage/' . $food->img) }}"
                                class="round-image" alt="{{ $food->name }}">
                            </div>
                            <div class="card-details mb-2 text-center">
                                <h2 class="title">{{ $food->name }}</h2> {{-- NOME DEL CIBO --}}
                                <p class="price">€ {{ $food->price }}</p>       {{-- PREZZO --}}
                                @if ($food->availability)                       {{-- DISPONIBILITA' --}}
                                    <p class="badge bg-success">DISPONIBILE</p>
                                @else
                                    <p class="badge bg-danger">NON DISPONIBILE</p>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('admin.foods.show', ['food' => $food->id]) }}" class="button-style-2">
                                    Vedi
                                </a>
                                
                                <a href="{{ route('admin.foods.edit', ['food' => $food->id]) }}" class="button-style-2">
                                    Modifica
                                </a>

                                <form id="deleteForm" class="m-0" action="{{ route('admin.foods.destroy', ['food' => $food->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="showConfirmationMessage()" class="button-style-2">
                                        Elimina
                                    </button>
                                </form>
                                
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
                @endforeach
            </div>
        </div>
    </section>
@endsection

<style lang="scss" scoped>

    .title {
        font-weight: 700;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        min-height: 50px;
    }
    .price {
        font-weight: 600;
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

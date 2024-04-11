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
                            <div class="card-details mb-2 text-center">
                                <h2 class="title">{{ $food->name }}</h2> {{-- NOME DEL CIBO --}}
                                <p class="price">€ {{ $food->price }}</p>       {{-- PREZZO --}}
                                <p class="description">{{ $food->description }}</p>       {{-- PREZZO --}}
                                @if ($food->availability)                       {{-- DISPONIBILITA' --}}
                                    <p class="badge bg-success">DISPONIBILE</p>
                                @else
                                    <p class="badge bg-danger">NON DISPONIBILE</p>
                                @endif
                            </div>
                            <div class="d-flex justify-content-center">
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

    .description {
        font-size: 20px;
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

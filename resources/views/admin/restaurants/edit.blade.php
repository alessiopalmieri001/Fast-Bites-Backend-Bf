@extends('layouts.app')

@section('page-title', 'Restaurant Edit')

@section('main-content')
<h1>
    Restaurant Edit
</h1>

<div class="row">
    <div class="col py-4">
        {{-- Link per tornare alla lista dei ristoranti --}}
        <div class="mb-4">
            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary">
                Torna all'index dei ristoranti
            </a>
        </div>

        {{-- Gli errori di validazione vengono elencati qui --}} 
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Alla sottomissione del form verrà reindirizzato alla pagina show del ristorante modificato--}} 
        <form action="{{ route('admin.restaurants.update', ['restaurant' => $restaurant->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- NOME RISTORANTE --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nome Ristorante <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $restaurant->name) }}" placeholder="Inserisci il nome del ristorante..." maxlength="256" required>
            </div>

            {{-- INDIRIZZO RISTORANTE --}}
            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input class="form-control" type="text" id="address" name="address" placeholder="Inserisci l'indirizzo" value="{{ old('address', $restaurant->address) }}" max="256" required>
            </div>

            {{-- IVA RISTORANTE --}}
            <div class="mb-3">
                <label for="iva" class="form-label">Partita Iva</label>
                <input class="form-control" type="text" id="iva" name="iva" placeholder="Inserisci la partita iva..." value="{{ old('iva', $restaurant->iva) }}" max="11" min="11" required>
            </div>

            {{-- IMMAGINE RISTORANTE --}}
            <div class="mb-3">
                <label for="img" class="form-label">Cover Image</label>
                <input class="form-control" type="text" id="img" name="img" placeholder="Inserisci il link dell'immagine..." value="{{ old('img', $restaurant->img) }}" max="1024" required>
            </div>

            <div>
                <button type="submit" class="btn btn-warning w-100">
                    Aggiorna
                </button>
            </div>

        </form>
    </div>
</div>
@endsection

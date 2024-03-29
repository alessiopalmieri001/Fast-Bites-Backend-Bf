@extends('layouts.app')

@section('page-title', 'Food Create')

@section('main-content')
<h1>
    Food Create
</h1>

<div class="row">
    <div class="col py-4">
        {{-- Link per tornare alla lista dei ristoranti --}}
        <div class="mb-4">
            <a href="{{ route('admin.foods.index') }}" class="btn btn-primary">
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
        <form action="{{ route('admin.foods.update', ['food' => $food->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- NOME --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $food->name) }}" placeholder="Inserisci il nome del piatto..." maxlength="256" required>
            </div>

            {{-- DESCRIZIONE --}}
            <div class="mb-3">
                <label for="description" class="form-label"> Descrizione</label>
                <textarea class="form-control" id="description" rows="3" placeholder="Inserisci una descrizione del piatto..." required></textarea>
              </div>

            {{-- PREZZO --}}
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input class="form-control" type="text" id="price" name="price" placeholder="Inserisci la partita iva..." value="{{ old('iva', $food->iva) }}" required>
            </div>

            {{-- IMMAGINE --}}
            <div class="mb-3">
                <label for="img" class="form-label">Cover Image</label>
                <input class="form-control" type="text" id="img" name="img" placeholder="Inserisci il link dell'immagine..." value="{{ old('img', $food->img) }}" max="1024" required>
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

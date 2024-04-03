@extends('layouts.app')

@section('page-title', 'Food Create')

@section('main-content')
    <h1>Food Create</h1>

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
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Alla sottomissione del form verrà reindirizzato alla pagina show del ristorante modificato--}}
            <form action="{{ route('admin.foods.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NOME --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nome <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Inserisci il nome del piatto..." maxlength="256" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESCRIZIONE --}}
                <div class="mb-3">
                    <label for="description" class="form-label"> Descrizione <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci una descrizione del piatto..." required>{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PREZZO --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo<span class="text-danger">*</span></label>
                    <input class="form-control" type="number" step=".01"  id="price" name="price" placeholder="Inserisci il prezzo..." value="{{ old('price') }}" required>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- IMMAGINE --}}
                <div class="mb-3">
                    <label for="img" class="form-label">Inserisci immagine <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="img" id="img" required>
                    @error('img')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- visibility checkbox --}}
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="availability" id="availability" value="1"
                        {{ old('availability') ? 'checked' : '' }}>
                    <label class="form-check-label @error('availability') is-invalid @enderror"
                        for="availability">Disponibile</label>
                    @error('availability')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- aggiungi food --}}
                <div>
                    <button type="submit" class="btn btn-warning w-100">
                        aggiungi
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection

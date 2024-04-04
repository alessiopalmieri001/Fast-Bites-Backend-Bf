@extends('layouts.app')

@section('page-title', 'Food Edit')

@section('main-content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6 form-style-2">
            <h1 class="pb-5 text-center">
                Modifica il tuo piatto
            </h1>
            {{-- Link per tornare alla lista dei ristoranti --}}
            <div class="mb-4">
                <div class="d-flex justify-content-center"> <!-- Center the button -->
                    <a href="{{ route('admin.foods.index') }}" class="button-style-1">
                        Torna all'index foods
                    </a>
                </div>
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
                @method('PUT')
            
                {{-- NOME --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nome <span class="text-white">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $food->name) }}" placeholder="Inserisci il nome del piatto..." maxlength="256" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                {{-- DESCRIZIONE --}}
                <div class="mb-3">
                    <label for="description" class="form-label"> Descrizione <span class="text-white">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci una descrizione del piatto..." required>{{ old('description', $food->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                {{-- PREZZO --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo<span class="text-white">*</span></label>
                    <input class="form-control" type="number" step=".01"  id="price" name="price" placeholder="Inserisci il prezzo..." value="{{ old('price', $food->price) }}" required>
                    @error('price')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                {{-- IMMAGINE --}}
                <div class="mb-3">
                    <label for="current_image" class="form-label">Immagine Attuale<span class="text-white">*</span></label>
                    <img src="{{ substr($food->img, 0, 4) === 'http' ? $food->img : asset('storage/' . $food->img) }}" alt="Current Food Image" class="img-fluid mb-2">
                    <input type="hidden" name="current_image" value="{{ $food->img }}">
    
                    <label for="img" class="form-label">Scegli una nuova immagine</label>
                    <input class="form-control" type="file" name="img" id="img">
                    @error('img')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                {{-- Availability checkbox --}}
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="availability" checked id="availability" value="1"
                        {{ old('availability', $food->availability) ? 'checked' : '' }}>
                    <label class="form-check-label @error('availability') is-invalid @enderror"
                        for="availability">Disponibile</label>
                    @error('availability')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="d-flex justify-content-center"> <!-- Center the button -->
                    <button class="button-style-1" type="submit">
                        Aggiorna
                    </button>
                </div>
            
            </form>            
        </div>
    </div>
</div>
@endsection

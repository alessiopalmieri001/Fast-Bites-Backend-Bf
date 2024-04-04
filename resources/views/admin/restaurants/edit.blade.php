@extends('layouts.app')

@section('page-title', 'Restaurant Edit')

@section('main-content')

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-6 form-style-2">
            <h1 class="pb-5 text-center">
                Modifica il tuo ristorante
            </h1>
            {{-- Link per tornare alla lista dei ristoranti --}}
            <div class="mb-4">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.restaurants.index') }}" class="button-style-1">
                        Torna all'index dei ristoranti
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
            <form action="{{ route('admin.restaurants.update', ['restaurant' => $restaurant->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                {{-- NOME RISTORANTE --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nome Ristorante<span class="text-white">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $restaurant->name) }}" placeholder="Inserisci il nome del ristorante..." maxlength="256" required>
                </div>
    
                {{-- INDIRIZZO RISTORANTE --}}
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo<span class="text-white">*</span></label>
                    <input class="form-control" type="text" id="address" name="address" placeholder="Inserisci l'indirizzo" value="{{ old('address', $restaurant->address) }}" max="256" required>
                </div>
    
                {{-- IVA RISTORANTE --}}
                <div class="mb-3">
                    <label for="iva" class="form-label">Partita Iva<span class="text-white">*</span></label>
                    <input class="form-control" type="text" id="iva" name="iva" placeholder="Inserisci la partita iva..." value="{{ old('iva', $restaurant->iva) }}" max="11" min="11" required>
                </div>
    
                {{-- IMMAGINE RISTORANTE --}}

                <div class="mb-3">
                    <label for="current_image" class="form-label">Immagine Attuale<span class="text-white">*</span></label>
                    <img src="{{ substr($restaurant->img, 0, 4) === 'http' ? $restaurant->img : asset('storage/' . $restaurant->img) }}" alt="Current Food Image" class="img-fluid mb-2">
                    <input type="hidden" name="current_image" value="{{ $restaurant->img }}">
    
                    <label for="img" class="form-label">Scegli una nuova immagine</label>
                    <input class="form-control" type="file" name="img" id="img">
                </div>
    
                <div class="mb-3">
                    <label class="mb-2">Categorie<span class="text-light">*</span></label>
                    <div class="checkbox-groups">
                        @foreach ($categories as $category)
                            <div class="form-check form-check-inline w-25">
                                <input class="form-check-input @error('categories') @enderror" 
                                    type="checkbox" 
                                    name="categories[]" 
                                    id="category{{ $category->id }}" 
                                    value="{{ $category->id }}"
                                    {{ $restaurant->categories->contains($category->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="category{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="d-flex justify-content-center">
                    <button type="submit" class="button-style-1">
                        Aggiorna
                    </button>
                </div>
    
            </form>
        </div>
    </div>
</div>
@endsection

<style></style>

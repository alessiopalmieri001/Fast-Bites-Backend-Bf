@extends('layouts.app')

@section('page-title', 'Restaurant Create')

@section('main-content')
    <h1>Restaurant Create</h1>

    <div class="row">
        <div class="col py-4">
            <div class="mb-4">
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary">Torna all'index dei ristoranti</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nome Ristorante <span>*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Inserisci il nome del ristorante..." maxlength="256" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo  <span>*</span></label>
                    <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" placeholder="Inserisci l'indirizzo" value="{{ old('address') }}" max="256" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="iva" class="form-label">Partita Iva  <span>*</span></label>
                    <input class="form-control @error('iva') is-invalid @enderror" type="text" id="iva" name="iva" placeholder="Inserisci la partita iva..." value="{{ old('iva') }}" max="11" min="11" required>
                    @error('iva')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">Cover Image  <span>*</span></label>
                    <input class="form-control @error('img') is-invalid @enderror" type="text" id="img" name="img" placeholder="Inserisci il link dell'immagine..." value="{{ old('img') }}" max="1024" required>
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="mb-2">Categorie  <span>*</span></label>
                    <div class="checkbox-groups">
                        @foreach ($categories as $category)
                            <div class="form-check form-check-inline w-25">
                                <input class="form-check-input @error('categories') is-invalid @enderror" type="checkbox" name="categories[]"
                                    id="category{{ $category->id }}" 
                                    value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                
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

                <div>
                    <button type="submit" class="btn btn-success w-100">+ Aggiungi</button>
                </div>

            </form>
        </div>
    </div>
@endsection

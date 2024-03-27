@extends('layouts.app')

@section('page-title', 'Restaurant Create')

@section('main-content')
<h1>
    Restaurant Create
</h1>

<div class="row">
    <div class="col py-4">
        <div class="mb-4">
            <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary">
                Torna all'index dei ristoranti
            </a>
        </div>

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

        <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome Ristorante <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Inserisci il nome del ristorante..." maxlength="256" required>
            </div>

            {{-- <div class="mb-3">
                <label for="category_id" class="form-label">Categoria</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option
                        value=""
                        {{ old('category_id') == null ? 'selected' : '' }}>
                        Seleziona una categoria...
                    </option>
                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
            </div> --}}

            <div class="mb-3">
                <label for="address" class="form-label">Indirizzo</label>
                <input class="form-control" type="text" id="address" name="address" placeholder="Inserisci l'indirizzo" value="{{ old('address') }}" max="256" required>
            </div>

            <div class="mb-3">
                <label for="iva" class="form-label">Partita Iva</label>
                <input class="form-control" type="text" id="iva" name="iva" placeholder="Inserisci la partita iva..." value="{{ old('iva') }}" max="11" min="11" required>
            </div>

            <div class="mb-3">
                <label for="img" class="form-label">Cover Image</label>
                <input class="form-control" type="text" id="img" name="img" placeholder="Inserisci il link dell'immagine..." value="{{ old('img') }}" max="1024" required>
            </div>

            <div>
                <button type="submit" class="btn btn-success w-100">
                    + Aggiungi
                </button>
            </div>

        </form>
    </div>
</div>
@endsection

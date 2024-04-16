@extends('layouts.app')

@section('page-title', 'Food Create')

@section('main-content')

<div class="container">
    
    <div class="mb-2">
        <h1 class="m-4 text-center title">
            Aggiungi un nuovo piatto
        </h1>
        {{-- Link per tornare alla lista dei ristoranti --}}
        <div class="d-flex justify-content-center"> <!-- Center the button -->
            <a href="{{ route('admin.foods.index') }}" class="button-style-3">
                Torna alla dashboard
            </a>
        </div>
    </div>

    <div class="row g-0 d-flex justify-content-center">
        <div class="col-lg-6 col-md-8 col-sm-12 form-style-2">

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
                    <label for="name" class="form-label">Nome <span class="text-white">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Inserisci il nome del piatto..." maxlength="256" required>
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- DESCRIZIONE --}}
                <div class="mb-3">
                    <label for="description" class="form-label"> Descrizione <span class="text-white">*</span></label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci una descrizione del piatto..." required>{{ old('description') }}</textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PREZZO --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo<span class="text-white">*</span></label>
                    <input class="form-control" type="number" step=".01" min="0" id="price" name="price" placeholder="Inserisci il prezzo..." value="{{ old('price') }}" required>
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- IMMAGINE --}}
                <div class="mb-3">
                    <label for="img" class="form-label">Inserisci immagine <span class="text-white">*</span></label>
                    <input class="form-control mb-4" type="file" name="img" id="img" accept=".jpg, .jpeg, .svg, .png" required>
                    <img class="mb-2" id="preview" src="#" alt="Anteprima dell'immagine" style="max-width: 200px; max-height: 200px; display: none;">
                    @error('img')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- visibility checkbox --}}
                <div class="mb-3 form-check">
                    <input class="form-check-input my-0 " type="checkbox" name="availability" checked id="availability" value="1" {{ old('availability') ? 'checked' : '' }}>
                    <label class="form-check-label @error('availability') is-invalid @enderror" for="availability">Disponibile</label>
                    @error('availability')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- aggiungi food --}}
                <div class="text-center">
                    <button class="button-style-3" type="submit">
                        Aggiungi
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('img').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('preview').setAttribute('src', event.target.result);
                document.getElementById('preview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            document.getElementById('preview').style.display = 'none';
        }
    });
</script>

@endsection

<style lang="scss" scoped>
    .title {
    font-family: 'Paytone One', sans-serif;
    font-size: 3rem;
    color: white;
    text-align: center;
    margin-bottom: 20px;
}
</style>
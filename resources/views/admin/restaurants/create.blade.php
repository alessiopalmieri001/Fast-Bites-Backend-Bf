@extends('layouts.app')

@section('page-title', 'Restaurant Create')

@section('main-content')

<section>
    <div class="container">
        <div class="mb-2">
            <h1 class="text-center m-4 text-light title">Crea il tuo ristorante</h1>
        </div>

        <div class="row g-0 d-flex justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-12 form-style-2">

            @if ($errors->any())
                <div class="alert alert-danger mb-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form id="restaurantForm" action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- NOME RISTORANTE --}}

                <div class="mb-3">
                    <label for="name" class="form-label">Nome Ristorante<span class="text-light">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Inserisci il nome del ristorante..." maxlength="256" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- INDIRIZZO --}}

                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo<span class="text-light">*</span></label>
                    <input class="form-control @error('address') is-invalid @enderror" type="text" id="address" name="address" placeholder="Inserisci l'indirizzo" value="{{ old('address') }}" max="256" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- PARTITA IVA --}}

                <div class="mb-3">
                    <label for="iva" class="form-label">Partita Iva<span class="text-light">*</span></label>
                    <input class="form-control @error('iva') is-invalid @enderror" type="text" id="iva" name="iva" placeholder="Inserisci la partita iva..." value="{{ old('iva') }}" required>
                    @error('iva')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div id="ivaLengthError" class="alert alert-danger" style="display: none; background-color: #f8d7da; color: #721c24;">La Partita IVA deve contenere esattamente 11 cifre.</div>
                <div id="ivaFormatError" class="alert alert-danger" style="display: none; background-color: #f8d7da; color: #721c24;">La Partita IVA deve consistere solo di cifre.</div>

                
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#iva').on('input', function() {
                            var ivaValue = $(this).val();
                            var ivaLength = ivaValue.length;
                            var isNumeric = /^\d+$/.test(ivaValue);
                            if (ivaLength !== 11 && !isNumeric) {
                                $('#ivaLengthError').show(); // Mostra il messaggio di errore sulla lunghezza
                                $('#ivaFormatError').show(); // Mostra il messaggio di errore sul formato
                            } else if (ivaLength !== 11) {
                                $('#ivaLengthError').show(); // Mostra il messaggio di errore sulla lunghezza
                                $('#ivaFormatError').hide(); // Nascondi il messaggio di errore sul formato
                            } else if (!isNumeric) {
                                $('#ivaLengthError').hide(); // Nascondi il messaggio di errore sulla lunghezza
                                $('#ivaFormatError').show(); // Mostra il messaggio di errore sul formato
                            } else {
                                $('#ivaLengthError').hide(); // Nascondi il messaggio di errore sulla lunghezza
                                $('#ivaFormatError').hide(); // Nascondi il messaggio di errore sul formato
                            }
                        });
                    });
                </script>
                
                
                {{-- IMMAGINE --}}
                <div class="mb-3">
                    <label for="img" class="form-label">Inserisci immagine <span class="text-white">*</span></label>
                    <input class="form-control mb-4" type="file" name="img" id="img" accept=".jpg, .jpeg, .svg, .png" required>
                    <img class="mb-2" id="preview" src="#" alt="Anteprima dell'immagine" style="max-width: 200px; max-height: 200px; display: none;">
                    @error('img')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- CATEGORIE --}}
                <div class="mb-3">
                    <label class="mb-2">Categorie<span class="text-light">*</span></label>
                    <div class="checkbox-groups">
                        @foreach ($categories as $category)
                            <div class="form-check form-check-inline w-25">
                                <input class="form-check-input @error('categories')  @enderror" type="checkbox" name="categories[]"
                                    id="category{{ $category->id }}" 
                                    value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                
                                <label class="form-check-label" for="category{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                        <div class="alert alert-danger mt-3" id="categoryError" style="display: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M12 9v2m0 4v.01" />
                                <path d="M12 3a9 9 0 0 1 9 9a9 9 0 0 1 -9 9a9 9 0 0 1 -9 -9a9 9 0 0 1 9 -9" />
                            </svg>
                            Selezionare almeno una categoria.
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center"> 
                    <button type="submit" class="button-style-3">+ Aggiungi</button>
                </div>

            </form>
        </div>
    </div>
</section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#restaurantForm').submit(function(event) {
                // Verifica se almeno una categoria è stata selezionata
                if ($('input[name="categories[]"]:checked').length === 0) {
                    event.preventDefault(); // Impedisce l'invio del modulo
                    $('#categoryError').show(); // Mostra il messaggio di errore
                }
            });
        });

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

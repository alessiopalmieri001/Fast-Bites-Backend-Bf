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
    
                {{-- PARTITA IVA --}}

                {{-- PARTITA IVA --}}
                <div class="mb-3">
                    <label for="iva" class="form-label">Partita Iva<span class="text-light">*</span></label>
                    <input class="form-control @error('iva') is-invalid @enderror" type="text" id="iva" name="iva" placeholder="Inserisci la partita iva..." value="{{ old('iva', $restaurant->iva) }}" required>
                    @error('iva')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div id="ivaLengthError" class="alert alert-danger" style="display: none; background-color: #f8d7da; color: #721c24;">La Partita IVA deve contenere esattamente 11 cifre.</div>
                    <div id="ivaFormatError" class="alert alert-danger" style="display: none; background-color: #f8d7da; color: #721c24;">La Partita IVA deve consistere solo di cifre.</div>
                </div>
                
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                    // Nascondi gli errori relativi alla Partita IVA all'avvio
                    $('#ivaLengthError').hide();
                    $('#ivaFormatError').hide();

                    $('#iva').on('input', function() {
                        var ivaValue = $(this).val();
                        var ivaLength = ivaValue.length;
                        var isNumeric = /^\d+$/.test(ivaValue);
                        if (ivaLength !== 11 && !isNumeric) {
                            $('#ivaLengthError').show();
                            $('#ivaFormatError').show();
                        } else if (ivaLength !== 11) {
                            $('#ivaLengthError').show();
                            $('#ivaFormatError').hide();
                        } else if (!isNumeric) {
                            $('#ivaLengthError').hide();
                            $('#ivaFormatError').show();
                        } else {
                            $('#ivaLengthError').hide();
                            $('#ivaFormatError').hide();
                        }
                    });
                });
                </script>
    
                {{-- IMMAGINE RISTORANTE --}}
                <div class="mb-3">
                    <label for="current_image" class="form-label">Immagine Attuale<span class="text-white">*</span></label>
                    <div class="img-container">
                        <img src="{{ substr($restaurant->img, 0, 4) === 'http' ? $restaurant->img : asset('storage/' . $restaurant->img) }}" alt="Current Food Image" class="img-fluid mb-2">
                    </div>
                    <input type="hidden" name="current_image" value="{{ $restaurant->img }}">

                    <label for="img" class="form-label">Scegli una nuova immagine (opzionale)</label>
                    <input class="form-control" type="file" name="img" id="img">
                </div>
    
                <div class="mb-3">
                    <label class="mb-2">Categorie<span class="text-light">*</span></label>
                    <div class="checkbox-groups">
                        @foreach ($categories as $category)
                            <div class="form-check form-check-inline w-25">
                                <input class="form-check-input @error('categories') @enderror" type="checkbox" name="categories[]" 
                                    id="category{{ $category->id }}" 
                                    value="{{ $category->id }}"
                                    {{ $restaurant->categories->contains($category->id) ? 'checked' : '' }}>
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
                    <button type="submit" class="button-style-1">
                        Aggiorna
                    </button>
                </div>
    
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('form').submit(function(event) {
                // Verifica se almeno una categoria è stata selezionata
                if ($('input[name="categories[]"]:checked').length === 0) {
                    event.preventDefault(); // Impedisce l'invio del modulo
                    $('#categoryError').show(); // Mostra il messaggio di errore
                }
            });
        });

    </script>
@endsection

<style lang="scss" scoped>
.img-container {
        width: 300px;
        justify-content: center;
        display: flex;
    }
</style>

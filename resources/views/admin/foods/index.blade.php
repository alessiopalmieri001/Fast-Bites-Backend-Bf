@extends('layouts.app')

@section('page-title', 'I foods')

@section('main-content')
    <section class="container">
        <div>
            <div class="mb-2">
                <h1 class="text-center m-4 text-light title">Il tuo menù</h1>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.foods.create') }}" class="button-style-3">
                        + Aggiungi un nuovo piatto
                    </a>
                </div>
            </div>
            
            <div class="row justify-content-center m-0 g-0"> 
                @foreach ($user->restaurants->foods as $food)
                <div class="col-lg-3 col-md-8 col-sm-12 food-card m-3">
                    <div>
                        <div class="food-image">
                            <img src="{{ substr($food->img, 0, 4) === 'http' ? $food->img : asset('storage/' . $food->img) }}"
                            class="food-image" alt="{{ $food->name }}">
                        </div>
                        <div class="text-center">
                            <h2 class="food-name my-3">{{ $food->name }}</h2>
                            <h6 class="mb-3 text-dark fw-bold ">€ {{ $food->price }}</h6>  
                            <h6 class="text-dark mx-4 description">{{ $food->description }}</h6>  
                            <div class="d-flex justify-content-center align-items-center">
                                @if ($food->availability)                       
                                <p class="badge-pill-2">Disponibile</p>
                                @else
                                <p class="badge-pill-1">Non Disponibile</p>
                                @endif
                            </div>     
                        </div>
                        <div class="d-flex justify-content-center">
                            {{-- <a href="{{ route('admin.foods.show', ['food' => $food->id]) }}" class="button-style-foods">
                                Vedi
                            </a> --}}
                            
                            <a href="{{ route('admin.foods.edit', ['food' => $food->id]) }}" class="button-style-foods">
                                Modifica
                            </a>
    
                            <form id="deleteForm_{{ $food->id }}" class="m-0" action="{{ route('admin.foods.destroy', ['food' => $food->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" onclick="showConfirmationMessage('{{ $food->id }}')" class="button-style-foods">
                                    Elimina
                                </button>
                            </form>
                            
                            @foreach ($user->restaurants->foods as $food)
                                <div id="confirmationMessage_{{ $food->id }}" class="confirmation-message" style="display: none;">
                                    <div class="confirmation-message-content">
                                        <h3>Sei sicuro di voler eliminare questo elemento?</h3>
                                        <button onclick="confirmDelete('{{ $food->id }}')" class="button-style-2">Conferma</button>
                                        <button onclick="hideConfirmationMessage('{{ $food->id }}')" class="button-style-2">Annulla</button>
                                    </div>
                                </div>
                            @endforeach

                            
                            <script src="{{ asset('js/confirmation.js') }}"></script>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

<style lang="scss" scoped>



.title {
    font-family: 'Paytone One', sans-serif;
    font-size: 3rem;
    color: white;
    text-align: center;
    margin-bottom: 20px;
}
.description {
    min-height: 70px;
}
.food-card {
    box-shadow: 0px 0px 5px rgb(214, 214, 214);
    background-color: rgba(255, 255, 255, 0.6);
    border: none;
    border-radius: 20px;
    margin: 10px;
    min-height: 300px;
    /* padding: 10px; */
    /* width: 275px; */
    text-align: center;
    cursor: pointer;
    transition: 0.2s;
    /* &:hover {
        transform: scale(1.09);
    } */
}

.food-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto 10px;
    object-fit: cover;
}

.food-name {
    color: #000000;
    font-weight: bold;
    font-size: 18px;
    font-family: 'Open Sans', 'sans-serif';
}

.badge-pill-1 {
    font-size: 15px;
    cursor: pointer;
    font-family: 'Open Sans', 'sans-serif';
    background-color: #bc3431;
    color: rgb(255, 255, 255);
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    border-radius: 25px;
    font-size: 16px;
    width: 120px;
}

.badge-pill-2 {
    font-size: 15px;
    cursor: pointer;
    font-family: 'Open Sans', 'sans-serif';
    background-color: #006b0d;
    color: rgb(255, 255, 255);
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    border-radius: 25px;
    font-size: 16px;
    width: 120px;
}

.button-style-foods {
    font-size: 15px;
    display: inline-block;
    text-decoration: none;
    color: white;
    padding: 10px 15px;
    margin: 4px 5px;
    cursor: pointer;
    border-radius: 24px;
    transition: background-color 0.3s ease;
    border: none;
    background-color: rgba(246, 144, 30, 1); 

    &:hover {
        background-color: white;
        color: black;
    }

    a {
        text-decoration: none;
    }
}
.confirmation-message {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 30%;
    margin: 0 auto;
    border-radius: 20px;
    background-color: rgba(0, 0, 0, 0.701); /* Trasparenza per sfondo scuro */
    z-index: 9999; /* Livello superiore */
}

.confirmation-message-content {
    padding: 20px;
    text-align: center;
}

@media (max-width: 1200px) {
    .food-card {
        flex: 0 0 33.33%;
        max-width: 33.33%;
    }
}

@media (max-width: 992px) {
    .food-card {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

@media (max-width: 576px) {
    .food-card {
        flex: 0 0 100%;
        max-width: 100%;
    }

    .justify-content-center {
        justify-content: center;
    }
}
</style>

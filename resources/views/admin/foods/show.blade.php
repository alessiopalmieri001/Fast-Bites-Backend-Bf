@extends('layouts.app')

@section('page-title', $food->name)

@section('main-content')

<section class="container">
    <div>
        <div class="mb-2">
            <h1 class="text-center m-4 text-light title">Il tuo piatto</h1>
            <div class="d-flex justify-content-center">
                <a href="{{ route('admin.foods.index') }}" class="button-style-3">
                    Ritorna al tuo menù
                </a>
            </div>
        </div>
        
        <div class="row justify-content-center m-0 g-0"> 
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8 food-card m-3">
                <div>
                    <div class="food-image">
                        <img src="{{ substr($food->img, 0, 4) === 'http' ? $food->img : asset('storage/' . $food->img) }}"
                        class="food-image" alt="{{ $food->name }}">
                    </div>
                    <div class="text-center">
                        <h2 class="food-name my-3">{{ $food->name }}</h2>
                        <h6 class="mb-3 text-dark fw-bold ">€ {{ $food->price }}</h6>  
                        <h6 class="mb-3 text-dark mx-2">{{ $food->description }}</h6>  
                        <div class="d-flex justify-content-center align-items-center">
                            @if ($food->availability)                       
                            <p class="badge-pill-2">Disponibile</p>
                            @else
                            <p class="badge-pill-1">Non Disponibile</p>
                            @endif
                        </div>     
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('admin.foods.show', ['food' => $food->id]) }}" class="button-style-foods">
                            Vedi
                        </a>
                        
                        <a href="{{ route('admin.foods.edit', ['food' => $food->id]) }}" class="button-style-foods">
                            Modifica
                        </a>

                        <form id="deleteForm" class="m-0" action="{{ route('admin.foods.destroy', ['food' => $food->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="showConfirmationMessage()" class="button-style-foods">
                                Elimina
                            </button>
                        </form>
                        
                        <div id="confirmationMessage" class="confirmation-message" style="display: none;">
                            <div class="confirmation-message-content">
                                <h3>Sei sicuro di voler eliminare questo elemento?</h3>
                                <button onclick="confirmDelete()" class="button-style-2">Conferma</button>
                                <button onclick="hideConfirmationMessage()" class="button-style-2">Annulla</button>
                            </div>
                        </div>
                        
                        <script src="{{ asset('js/confirmation.js') }}"></script>
                    </div>
                </div>
            </div>
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
.food-card {
    box-shadow: 0px 0px 5px rgb(214, 214, 214);
    background-color: rgba(255, 255, 255, 0.6);
    border: none;
    border-radius: 20px;
    margin: 10px;
    /* padding: 10px; */
    /* width: 275px; */
    text-align: center;
    cursor: pointer;
    transition: 0.2s;
    &:hover {
        transform: scale(1.09);
    }
}
.food-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin: 0 auto 10px;
    object-fit: cover;
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
</style>

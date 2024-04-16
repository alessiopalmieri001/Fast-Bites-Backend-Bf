@extends('layouts.app')

@section('page-title', 'I ristoranti')

@section('main-content')
    <section>
        <div class="container">
            <div class="mb-2">
                <h1 class="text-center m-4 text-light title">Il tuo ristorante</h1>
            </div>

            @if($user && $user->restaurants)
                <div class="row justify-content-center m-0 g-0">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="card-content d-flex align-items-center flex-column position-relative">
                                    <div class="card-image">
                                        <img src="{{ substr($user->restaurants->img, 0, 4) === 'http' ? $user->restaurants->img : asset('storage/' . $user->restaurants->img) }}" alt="{{ $user->restaurants->name }}" class="card-img-top" style="object-fit: cover; height: 500px; border-radius: 20px 20px 0 0;">
                                        <div class="overlay"></div>
                                        <!-- Moved card-subtitle inside card-image but before the img tag -->
                                        <div class="card-subtitle d-flex">
                                            @if (count($user->restaurants->categories) > 0)
                                                <ul class="d-flex justify-content-center p-0 list-unstyled">
                                                    @foreach ($user->restaurants->categories as $category)
                                                        <li class="text-center badge-category me-2">{{ $category->name }}</li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p>No Types</p>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <!-- Aggiunta dei badge per le categorie -->
                                    <div class="restaurant-details text-start fw-bold">
                                        <h4 class="restaurant-name">{{ $user->restaurants->name }}</h4>
                                        <div class="restaurant-address text-dark">
                                            <i class="fa-solid fa-location-dot pe-2"></i>{{ $user->restaurants->address }}
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-4 d-flex justify-content-center">
                                    <a href="{{ route('admin.restaurants.edit', ['restaurant' => $restaurant->id]) }}" class="button-style-3">
                                        Modifica
                                    </a>

                                    <form id="deleteForm" class="m-0" action="{{ route('admin.restaurants.destroy', ['restaurant' => $restaurant->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="showConfirmationMessage()" class="button-style-3">
                                            Elimina
                                        </button>
                                    </form>

                                    <a href="{{ route('admin.foods.index') }}" class="button-style-3">
                                        Vedi il tuo menù
                                    </a>

                                    <div id="confirmationMessage" class="confirmation-message" style="display: none;">
                                        <div class="confirmation-message-content">
                                            <h3>Sei sicuro di voler eliminare questo elemento?</h3>
                                            <button onclick="confirmDelete()" class="button-style-2">Conferma</button>
                                            <button onclick="hideConfirmationMessage()" class="button-style-2">Annulla</button>
                                        </div>
                                    </div>
                                    
                                    <script src="{{ asset('js/delete.js') }}"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <div class="text-center">
                            <a href="{{ route('admin.restaurants.create') }}" class="button-style-2 mb-3">
                                + Aggiungi
                            </a>
                            <div class="text-center">
                                <p>Nessun ristorante al momento</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection

<style lang="scss" scoped>
    
.card-content {
  cursor: pointer;
  position: relative;
  transition: transform 0.2s ease; 
  
}

.card-content:hover {
  transform: scale(1.03);
  /* filter: blur(2px); */
  .buy-button {
    display: block;
    transition: 0.3s ease-in;
    filter: none;
  }
}

.title {
    font-family: 'Paytone One', sans-serif;
    font-size: 3rem;
    color: white;
    text-align: center;
    margin-bottom: 20px;
}
.card-image {
  width: 100%;
  height: 500px; 
  border-radius: 20px;
  object-fit: cover;
  position: relative;
  overflow: hidden;
}

.overlay {
  position: absolute;
  top: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(180deg, rgba(0, 0, 0, 0.832) 0%, rgba(0, 0, 0, 0.253) 50%, rgba(0, 0, 0, 0) 100%);
  border-radius: 20px;
  z-index: 0;
}
.card-subtitle {
  position: absolute;
  top: 20px;
  left: 20px;
  padding: 5px 10px;
  color: #fff;
  border-radius: 20px;
  z-index: 1; 
}

.restaurant-details {
  color: black;
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 20px;
  font-size: 15px;
  background-color: rgba(255, 255, 255); 
  border-radius: 0 0 20px 20px;
}

.restaurant-name {
  font-family: 'Paytone One', sans-serif;
  margin-bottom: 5px;
}

.button-style-3 {
  display: inline-block;
  text-decoration: none;
  color: rgb(255, 255, 255);
  border: 1px solid transparent;
  padding: 8px 20px;
  margin: 4px 10px;
  cursor: pointer;
  border-radius: 24px;
  background-color: rgba(246, 144, 30, 1);
  transition:
    background-color 0.3s ease,
    border-color 0.3s ease;
}

.button-style-3:hover {
  color: white;
  background-color: transparent;
  border: 1px solid white;
}

.badge-category {
  background-color: #CC3333;
  font-size: 13px;
  border-radius: 10px;
  color: white;
  padding: 6px 12px;
  margin: 3px 0px;
  font-weight: bold;
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

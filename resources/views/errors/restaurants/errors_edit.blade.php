@extends('layouts.app')

    @section('main-content')

        <div class="pt-5 d-flex flex-column align-items-center justify-content-center">

            <h1 class="text-center">Oh no! Non puoi modificare un ristorante diverso dal tuo! </h1>
            <a href="{{ route('admin.restaurants.create') }}"
               class="btn btn-primary mt-3 d-flex align-items-center"><i
                    class="fa-solid fa-circle-left me-3 fs-5"></i><span>Crea il tuo ristorante</span></a>

        </div>

@endsection

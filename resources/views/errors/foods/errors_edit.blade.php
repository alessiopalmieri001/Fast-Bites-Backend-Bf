@extends('layouts.app')

    @section('main-content')

            <div class="pt-5 d-flex flex-column align-items-center justify-content-center">
                <h1 class="text-center">Errore di Pagina</h1>
                <a href="{{ route('admin.foods.index') }}" class="btn btn-primary mt-3 d-flex align-items-center"><i
                        class="fa-solid fa-circle-left me-3 fs-5"></i><span> Torna ai miei piatti</span></a>
            </div>

@endsection

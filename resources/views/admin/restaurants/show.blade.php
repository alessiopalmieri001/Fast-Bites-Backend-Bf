@extends('layouts.app')

@section('page-title', $restaurant->name)

@section('main-content')
    <section>
        <div class="row">
            <div class="mb-3">
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-success w-100">
                    Torna all'index
                </a>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="{{ $restaurant['img'] }}" alt="{{ $restaurant->name }}">
                        <h1>
                            {{ $restaurant->name}}
                        </h1>
                        <h3>
                            {{ $restaurant->address}}
                        </h3>
                        <h3>
                            {{ $restaurant->iva}}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<style lang="scss" scoped>

    .card {
        max-width: 300px;
        margin: 0 auto;
    }

</style>
@extends('layouts.customer_guest')

@section('page-title', 'homepage')

@section('content')
    <section>
        <div class="row">
            <div class="mb-3">
                <a href="{{ route('customer.foods.index') }}" class="btn btn-success w-100">
                    Torna al Ristorante
                </a>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="{{ $food['img'] }}" alt="{{ $food->name }}">
                        <h1>
                            {{ $food->name}}
                        </h1>
                        <h3>
                            {{ $food->description}}
                        </h3>
                        <h3>
                            {{ $food->price}}
                        </h3>
                        @if ($food->availability)
                            <i class="fa-solid fa-eye"></i>
                        @else
                            <i class="fa-solid fa-eye-slash"></i>
                        @endif
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

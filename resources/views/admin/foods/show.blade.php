@extends('layouts.app')

@section('page-title', $food->name)

@section('main-content')
    <section>
        <div class="row">
            <div class="mb-3">
                <a href="{{ route('admin.foods.index') }}" class="btn btn-success w-100">
                    Torna all'index
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
                            {{ $food->address}}
                        </h3>
                        <h3>
                            {{ $food->iva}}
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
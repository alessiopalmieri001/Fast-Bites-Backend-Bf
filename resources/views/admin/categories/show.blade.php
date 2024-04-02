@extends('layouts.app')

@section('page-title', $category->name)

@section('main-content')
    <section>
        <div class="row">
            <div class="mb-3">
                <a href="{{ route('admin.categories.index') }}" class="btn btn-success w-100">
                    Torna all'index
                </a>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="{{ $category['img'] }}" alt="{{ $category->name }}">
                        <h1>
                            {{ $category->name}}
                        </h1>
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
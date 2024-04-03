@extends('layouts.app')

@section('page-title', 'Homepage')

@section('main-content')
    <section>
        <div class="container">
            <h1 class="mb-4 text-center title">Hai fame?</h1>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Cerca il tuo ristorante" aria-label="Search">
                        <button class="btn btn btn-outline-danger" type="submit">Cerca</button>
                    </form>
                </div>
            </div>
            <div class="row mt-4">
                @foreach($categories as $category)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow">
                            <img src="{{ asset($category->image_path) }}" class="card-img-top" alt="{{ $category->name }}">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $category->name }}</h5>
                                <p class="card-text">Scopri i piatti della categoria "{{ $category->name }}".</p>
                                <a href="{{ route('customer.categories.show', ['category' => $category->id]) }}" class="btn btn-danger">Scopri di più</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

    <style>
  .title{
      font-size: 5rem;
  }

    </style>


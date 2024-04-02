@extends('layouts.app')

@section('page-title', 'the categories')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">Le nostre Categorie</h1>
            
            @foreach ($user->restaurants->categories as $category)
                <div class="col-md-3 container">
                    <div class="card m-1 custom-card" >
                        <div class="card-content">
                            <div class="card-img-container">
                                <img src="{{ $category['img'] }}" alt="{{ $category->name }}">
                            </div>
                            <div class="card-details">
                                <h2>{{ $category->name }}</h2>
                            </div>
                            <div class=" mb-2 d-flex justify-content-center">
                                <a href="{{ route('admin.categories.show', ['category' => $category->id]) }}" class="custom-button show ">
                                Vedi
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
<style>
    .custom-button {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        color: black;
        text-decoration: none;
        transition: background-color 0.3s;
    }
    .custom-button.add{
        background-color: white;
    }
        .custom-button.show{
        background-color: #F28920;
        margin-right: 5px;
        }
        .custom-button.edit{
        background-color: #F28920;
        }
    .custom-button:hover {
        background-color: #dd1818e7;
    }
</style>
@extends('layouts.app')

@section('page-title', 'homepage')

@section('main-content')
    <section>
        <div class="container">
            <h1>Hai fame?</h1>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul>
                @foreach($categories as $category)
                    <li>
                        <a href="{{route('customer.restaurants.index', ['category' => $category->id])}}">
                            {{ $category->name }}
                        </a>
                    </li>

                @endforeach
            </ul>
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

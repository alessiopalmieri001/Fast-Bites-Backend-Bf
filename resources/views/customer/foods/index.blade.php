@extends('layouts.customer_guest')

@section('page-title', 'homepage')

@section('content')
    <section>
        <div class="container">
            <ul>
                @foreach($foods as $food)
                    <li>
                        <a href="{{route('customer.foods.index', ['food' => $food->id])}}">
                            {{ $food->name }}
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

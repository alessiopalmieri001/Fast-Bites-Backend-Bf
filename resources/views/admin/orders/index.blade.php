@extends('layouts.app')

@section('page-title', 'Ordini')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">I tuoi ordini</h1>
            {{-- Reindirizzo l'utente alla pagina di creazione del ristorante --}}

            {{-- @if ($user && $user->restaurants) --}}
            <div class="container my-4">
                <div class="row p-3">
                    <div class="col">
                        <span class="table-btn p-2" onclick="orderByID()">
                            ID
                            <i id="id-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn p-2" onclick="orderByClient()">
                            Cliente
                            <i id="client-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn p-2" onclick="orderByStatus()">
                            Stato
                            <i id="status-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn p-2" onclick="orderByDate()">
                            Data
                            <i id="date-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn p-2" onclick="orderByTotal()">
                            Totale
                            <i id="total-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn p-2">
                            Azioni
                            <i id="total-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                </div>
                <div id="table-content" class="d-flex flex-column">
                    @foreach ($user->restaurants->orders as $order)
                        <div class="order-btn row{{ $order->id }}" style="order: 1;">
                            <div class="row order">
                                <div class="col id">
                                    <span>{{ $order->id }}</span>
                                </div>
        
                                <div class="col name">
                                    <span>{{ $order->name }}</span>
                                </div>
        
                                <div class="col status">
                                    <span
                                        class="badge" >{{ $order->status }}</span>
                                </div>
        
                                <div class="col date">
                                    <span>{{ $order->created_at }}</span>
                                </div>
        
                                <div class="col total">
                                    <span >€ {{ number_format($order->total, 2) }}</span>
                                </div>

                                <div class="col action">
                                    <button class="btn btn-outline-light" onclick="window.location='{{ route('admin.orders.show', $order->id) }}'"> Vedi </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            {{-- @else
                <div class=" mb-2 d-flex justify-content-center ">
                    <a href="{{ route('admin.restaurants.create') }}" class="custom-button add">
                        + Aggiungi
                    </a>
                </div>

                <div>
                    <p>Ristorante non trovato</p>
                </div>
            @endif --}}
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

    .custom-button.add {
        background-color: white;
    }

    .custom-button.show {
        background-color: #F28920;
        margin-right: 5px;
    }

    .custom-button.edit {
        background-color: #F28920;
    }

    .custom-button:hover {
        background-color: #dd1818e7;
    }
</style>

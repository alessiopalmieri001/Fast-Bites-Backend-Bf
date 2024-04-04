@extends('layouts.app')

@section('page-title', 'Ordini')

@section('main-content')
    <section>
        <div class="row">
            <h1 class="text-center m-4 text-light">I tuoi ordini</h1>
            {{-- Reindirizzo l'utente alla pagina di creazione del ristorante --}}
            
            {{-- Check if user has restaurants --}}
            <div class="container my-4">
                <div class="row order-header">
                    <div class="col">
                        <span class="table-btn" onclick="orderByID()">
                            ID
                            <i id="id-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn" onclick="orderByClient()">
                            Cliente
                            <i id="client-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn" onclick="orderByStatus()">
                            Stato
                            <i id="status-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn" onclick="orderByDate()">
                            Data
                            <i id="date-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn" onclick="orderByTotal()">
                            Totale
                            <i id="total-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                    <div class="col">
                        <span class="table-btn">
                            Azioni
                            <i id="total-icon" class="fas fa-sort-down ms-1 d-none table-icon"></i>
                        </span>
                    </div>
                </div>
                <div id="table-content" class="d-flex flex-column">
                    {{-- Loop through orders --}}
                    @foreach ($user->restaurants->orders as $order)
                        <div class="row order">
                            <div class="col">
                                <span>{{ $order->id }}</span>
                            </div>

                            <div class="col">
                                <span>{{ $order->name }}</span>
                            </div>

                            <div class="col">
                                <span class="order-pill">{{ $order->status }}</span>
                            </div>

                            <div class="col">
                                <span>{{ $order->created_at }}</span>
                            </div>

                            <div class="col">
                                <span>€ {{ number_format($order->total, 2) }}</span>
                            </div>

                            <div class="col">
                                <button class="button-style-1" onclick="window.location='{{ route('admin.orders.show', $order->id) }}'">Vedi</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

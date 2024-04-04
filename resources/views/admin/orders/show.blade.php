@extends('layouts.app')

@section('page-title', 'Singolo ordine')

@section('main-content')

    <section>
        <div class="row justify-content-center"> <!-- Center the row -->
            <div class="col-md-6"> <!-- Adjust column width as needed -->
                <div class="mb-3 text-center"> <!-- Center the button -->
                    <a href="{{ route('admin.orders.index') }}" class="button-style-1">
                        Torna alla lista degli ordini
                    </a>
                </div>
            </div>
        </div>

        @if ($order)
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
            </div>
        </div>
        <div id="table-content" class="d-flex flex-column {{ $order->id }}" style="order: 1;">
                <div class="row order pb-3">
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
                </div>
        </div>

        @else
            <div class="col">
                <p class="text-center">Nessun ordine disponibile al momento!</p>
            </div>
        @endif
    </section>
@endsection

<style lang="scss" scoped>
    .card {
        max-width: 300px;
        margin: 0 auto;
    }
</style>

@extends('layouts.app')

@section('page-title', 'Singolo ordine')

@section('main-content')

    <section>
        <div class="row">
            <div class="mb-3">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-success w-100">
                    Torna all'index
                </a>
            </div>
            @if ($order)
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
            </div>
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

                </div>
            </div>

            @else
                <div class="col">
                    <p>Nessun ordine disponibile al momento!</p>
                </div>
            @endif
        </div>
    </section>
@endsection

<style lang="scss" scoped>
    .card {
        max-width: 300px;
        margin: 0 auto;
    }
</style>

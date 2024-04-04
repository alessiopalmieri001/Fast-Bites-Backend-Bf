@extends('layouts.app')

@section('page-title', 'Singolo ordine')

@section('main-content')

<section>
    <div class="row justify-content-center"> 
        <div class="col-md-6">
            <div class="mb-3 text-center">
                <a href="{{ route('admin.orders.index') }}" class="button-style-1">
                    Torna alla lista degli ordini
                </a>
            </div>
        </div>
    </div>

    @if ($order)
    <div class="container my-4">
        <!-- Header della tabella -->
        <div class="row mb-4">
            <div class="col-auto">
                <span>{{ $order->name }}</span>
            </div>

            <div class="col-auto">
                <span class="order-pill">{{ $order->status }}</span>
            </div>

            <div class="col-auto">
                <span>{{ $order->created_at }}</span>
            </div>

            <div class="col-auto">
                <span>{{ $order->address }}</span>
            </div>
        </div>

        <!-- Dettagli dell'ordine -->
        <div id="table-content" class="d-flex flex-column {{ $order->id }}" style="order: 1;">

            <!-- Dettagli dei cibi ordinati -->
            <div class="row order pb-3">
                <div class="col">
                    <span><strong>Cibo</strong></span>
                </div>
                <div class="col">
                    <span><strong>Quantità</strong></span>
                </div>
                <div class="col">
                    <span><strong>Prezzo unitario</strong></span>
                </div>
                <div class="col">
                    <span><strong>Totale unitario</strong></span>
                </div>
            </div>

            <!-- Ciclo per mostrare i cibi ordinati -->
            @foreach($order->foods as $food)
            <div class="row order pb-3 ">
                <div class="col">
                    <span>{{ $food->name }}</span>
                </div>
                <div class="col">
                    <span>{{ $food->pivot->quantity }}</span>
                </div>
                <div class="col">
                    <span>€ {{ $food->price }}</span> <!-- Aggiunta del prezzo unitario -->
                </div>
                <div class="col">
                    <span>€ {{ ($food->price)*($food->pivot->quantity)}}</span> <!-- Aggiunta del prezzo unitario -->
                </div>
            </div>
            @endforeach

            <!-- Totale -->
            <div class="row pb-3 justify-content-end mt-4 ">
                <div class="col-auto">
                    <h3><strong>Totale</strong></h3>
                </div>
                <div class="col-auto">
                    <!-- Se vuoi mostrare il totale dell'ordine -->
                    <h3>€ {{ number_format($order->total, 2) }}</h3>
                </div>
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

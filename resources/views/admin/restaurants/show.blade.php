@extends('layouts.app')

@section('page-title', $restaurant->name)

@section('main-content')
    <section>
        <div class="row">
            <div class="mb-3">
                <a href="{{ route('admin.restaurants.index') }}" class="btn btn-success w-100">
                    Torna all'index
                </a>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <img src="{{ $restaurant['img'] }}" alt="{{ $restaurant->name }}">
                        <h1>
                            {{ $restaurant->name}}
                        </h1>
                        <h3>
                            {{ $restaurant->address}}
                        </h3>
                        <h3>
                            {{ $restaurant->iva}}
                        </h3>
                    </div>
                </div>
            </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Disponibilità</th>
                    <th scope="col">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                    @if ($restaurant->foods->isNotEmpty())
                        @foreach ($restaurant->foods as $food)
                            <tr>
                                <th scope="row">{{ $food->id }}</th>
                                <td>{{ $food->name }}</td>
                                <td>{{ $food->description }}</td>
                                <td>{{ $food->price }}</td>
                                <td>{{ $food->availability }}</td>
                                <td>
                                    <a href="{{ route('admin.foods.show', ['food' => $food->id]) }}" class="btn btn-xs btn-primary">Vedi</a>
                                    <a href="{{ route('admin.foods.edit', ['food' => $food->id]) }}" class="btn btn-xs btn-warning">Modifica</a>
                                    <form class="d-inline-block" action="{{ route('admin.foods.destroy', ['food' => $food->id]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo cibo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">Nessun cibo disponibile per questo ristorante</td>
                        </tr>
                    @endif
                </tbody>
              </table>
        </div>
    </section>
@endsection

<style lang="scss" scoped>
    .card {
        max-width: 300px;
        margin: 0 auto;
    }
    
</style>

@extends('layouts.app')

@section('page-title', 'Ristoranti')

@section('main-content')
    <section>
        <section>
            <div class="row">
                @foreach($foods as $food)
                    <li>
                        <a href="{{route('customer.foods.show', ['food' => $food->id])}}">
                            {{ $food->name }}
                        </a>
                    </li>

                @endforeach
            </div>
        </section>
    </section>
@endsection

<style lang="scss" scoped>

    .card {
        max-width: 300px;
        margin: 0 auto;
    }

</style>

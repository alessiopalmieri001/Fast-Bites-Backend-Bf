@extends('layouts.app')

@section('page-title', 'Ristoranti')

@section('main-content')
    <section>
        <div class="row">
            @foreach($restaurants as $restaurant)
                <li>
                    <a href="">
                        {{ $restaurant->name }}
                    </a>
                </li>
            @endforeach
        </div>
    </section>
@endsection

<style lang="scss" scoped>

    .card {
        max-width: 300px;
        margin: 0 auto;
    }

</style>

@extends('layouts.customer_guest')

@section('page-title', $category->name)

@section('content')
    <section>
        <div class="row">
            @foreach($restaurants as $restaurant)
                <li>
                    <a href="{{route('customer.restaurants.show', ['restaurant' => $restaurant->id])}}">
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

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- font awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>@yield('page-title') | {{ config('app.name', 'Fastbites') }}</title>

        <link rel="icon" type="image/png" href="{{ asset('images/faviconlogo.png') }}">

        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">


        @vite('resources/js/app.js')
    </head>
    
    <div class="background-container">

        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <div class="logo-header">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('images/logoscritta.png') }}" alt="logo">
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-baseline">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.restaurants.index') }}">Il tuo ristorante</a>
                            </li>
                            {{-- Verifica se l'utente ha un ristorante, quindi mostra il link per il menu --}}
                            @if($user->restaurants)
                            <li>
                                <a href="{{ route('admin.foods.index') }}">Il tuo menu</a>
                            </li>
                            {{-- Verifica se l'utente ha un ristorante, quindi mostra il link per il menu --}}
                            <li>
                                <a href="{{ route('admin.orders.index') }}">I tuoi ordini</a>
                            </li>
                            @endif
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="button-style-3" type="submit" class="button">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            <div class="container">
                @yield('main-content')

                @yield('scripts')
            </div>
        </main>
    </div>
</html>
<style>
        header nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
     .navbar-brand img{
    width: 150px;
}
    nav ul li {
            display: inline;
            margin-right: 20px;
        }

    nav ul li:last-child {
            margin-right: 0;
        }

    nav ul li a {
            color: #fff;
            text-decoration: none;
        }


        main {
            padding: 20px 0;
        }
    </style>

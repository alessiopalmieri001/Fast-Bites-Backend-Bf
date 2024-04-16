<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- font awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">


        @vite('resources/js/app.js')
    </head>

    <div class="background-container">
        <header>
            <div class="container d-flex justify-content-between align-items-center">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logoscritta.png') }}" alt="Logo" >
                </a>
                <nav>
                    <ul class="p-0 d-flex justify-content-between align-items-center">
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('customer.categories.index') }}">Carrello</a>
                        </li>
                        {{-- Verifica se l'utente ha un ristorante, quindi mostra il link per il menu --}}

                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <div>
                @yield('content')
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

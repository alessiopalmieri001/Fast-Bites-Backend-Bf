<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        @vite('resources/js/app.js')
    </head>
    <body>
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
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.restaurants.index') }}">I nostri ristoranti</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.foods.index') }}">I nostri cibi</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}">le nostre categorie</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                        <button type="submit" class="button">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
        </header>


        <main>
            <div class="container">
                @yield('main-content')
            </div>
        </main>
    </body>
</html>
<style>
        header {
            background-color: #F28920;
            color: #fff;
           
        }
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
        .button{
        width: 100px;
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        color: black;
        text-decoration: none;
        transition: background-color 0.3s;
        background-color: white;
        }
        .button:hover {
        background-color: #dd1818e7;
    }

        main {
            padding: 20px 0;
        }
    </style>

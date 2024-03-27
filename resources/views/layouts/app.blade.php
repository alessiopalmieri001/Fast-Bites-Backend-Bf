<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <header>
           <div class="container d-flex justify-content-between align-items-center">
             <a class="navbar-brand" href="#">
                <img src="" alt="Logo" height="30">
            </a>
            <nav>
                <ul class="p-0">
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
                        
                    </li>
                </ul>
                 <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-white text-white">Logout</button>
                </form>
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
            background-color: #F38A20;
            color: #fff;
            padding: 10px 0;
        }
        header nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
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

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
            <div class="container">
                
            <nav>
                <ul class="p-0">
                    <li>
                        <a href="/">Home</a>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li>

                            <a href="{{ route('admin.restaurants.index') }}">I nostri ristoranti</a>
                            

                        </li>
                    </li>
                </ul>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="">
                        Log Out
                    </button>
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

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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Paytone+One&display=swap" rel="stylesheet">
        @vite('resources/js/app.js')
    </head>
    
    <body class="background-container">

        <header>
            <nav class="navbar navbar-expand-lg mt-4 mb-3">
                <div class="container">
                    <div class="logo">
                        <a class="navbar-brand" href="http://localhost:5174/">
                            <img src="{{ asset('images/logoscritta.png') }}" alt="logo">
                        </a>
                    </div>

                    <form class="m-0" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="button-style-3" type="submit" class="button">Logout</button>
                    </form>
                </div>
            </nav>
        </header>

        <main>
            <div class="container">
                @yield('main-content')

                @yield('scripts')
            </div>
        </main>
    </body>
</html>

<style lang="scss" scoped>
    .logo {
    width: 230px;
}

img {
    width: 100%;
}

header {
    background-color: transparent;
    color: #fff;
}


.subtitle {
    font-family: 'Paytone One', sans-serif;
    color: #BC3431;
    margin-bottom: 0;
    line-height: 1.5;
}


 </style>

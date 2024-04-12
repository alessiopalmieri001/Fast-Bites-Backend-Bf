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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Offcanvas menu -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas" aria-labelledby="offcanvasLabel">
                        <div class="offcanvas-header p-3">
                            <button type="button" class="btn-close button-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body m-4">
                            <h5 class="offcanvas-title" id="offcanvasLabel">Menu</h5>
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.restaurants.index') }}">Il tuo ristorante</a>
                                </li>
                                {{-- Verifica se l'utente ha un ristorante, quindi mostra il link per il menu --}}
                                @if($user->restaurants)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.foods.index') }}">Il tuo menu</a>
                                </li>
                                {{-- Verifica se l'utente ha un ristorante, quindi mostra il link per il menu --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.orders.index') }}">I tuoi ordini</a>
                                </li>
                                @endif
                                <form class="m-0" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="button-style-3" type="submit" class="button">Logout</button>
                                </form>
                            </ul>
                        </div>
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

.navbar-toggler {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23ffffff' stroke-linecap='round' stroke-miterlimit='10' stroke-width='1' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-size: cover;
    border: none;
    padding: 0.5rem 0.5rem;
    font-size: 1.25rem;
    line-height: 1;
    background-color: transparent;
    color: #ffffff;

}

.navbar-toggler:focus,
.navbar-toggler:active,
.navbar-toggler-icon:focus {
    outline: none;
    box-shadow: none;
}

.navbar-toggler-icon {
    display: inline-block;
    width: 1.5em;
    height: 1.5em;
    vertical-align: middle;
    content: "";
    background: no-repeat center center;
    background-size: contain;
}

.offcanvas-header {
    padding: 0.5rem;
}

.subtitle {
    font-family: 'Paytone One', sans-serif;
    color: #BC3431;
    margin-bottom: 0;
    line-height: 1.5;
}

#offcanvasLabel {
    font-family: 'Paytone One', sans-serif;
    color: #BC3431;
    margin-bottom: 0;
    line-height: 1.5;
}

.offcanvas-body {
    padding: 0.5rem;
}


.button-close {
    border-radius: 50%;
    background-color: rgba(246, 144, 30, 1);
    color: white;
    border: none;
    padding: 15px;
    width: 20px;
    /* margin-bottom: 5px; */
}



.offcanvas-nav .nav-link {
    color: black;
}

@media (min-width: 992px) {
.navbar-nav .nav-link {
    color: white !important;
}
.offcanvas-title {
    display: none;
}
.offcanvas-body {
    flex-direction: row;
    justify-content: flex-end;
}
}

 </style>

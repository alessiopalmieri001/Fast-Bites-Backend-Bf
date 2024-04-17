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
            <nav class="navbar navbar-expand-lg mt-5 mb-3 flex-nowrap">
                <div class="container">
                    <div class="logo">
                        <a class="navbar-brand" href="http://localhost:5174/">
                            <img src="{{ asset('images/logoscritta.png') }}" alt="logo">
                        </a>
                    </div>
    
                    <div class="d-flex justify-content-end">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                            
                        <!-- Offcanvas menu -->
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas" aria-labelledby="offcanvasLabel" style="width: 100%">
                            <div class="offcanvas-header p-3">
                                <button type="button" class="btn-close button-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body mx-4 pe-2">
                                <h5 class="offcanvas-title mx-2" id="offcanvasLabel">Menu</h5>
                                <ul class="navbar-nav">
                                    <li class="nav-item mx-2">
                                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="nav-item mx-2">
                                        <a class="nav-link" href="{{ route('admin.restaurants.index') }}">Il tuo ristorante</a>
                                    </li>
                                    {{-- Verifica se l'utente ha un ristorante, quindi mostra il link per il menu --}}
                                    @if($user->restaurants)
                                    <li class="nav-item mx-2">
                                        <a class="nav-link" href="{{ route('admin.foods.index') }}">Il tuo menu</a>
                                    </li>
                                    {{-- Verifica se l'utente ha un ristorante, quindi mostra il link per il menu --}}
                                    <li class="nav-item mx-2">
                                        <a class="nav-link" href="{{ route('admin.orders.index') }}">I tuoi ordini</a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <form class="g-0 m-0 d-flex align-items-center" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="button-style-3 m-0 ms-4" type="submit" class="button">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>
    
        <main>
            @yield('main-content')
        </main>
    
        @yield('scripts')

        <footer class="p-2">
            <div class="container py-5">
                <div class="row d-flex align-items-center pb-4">
                    <div class="col">
                        <div class="logo-container">
                            <img src="{{ asset('images/logo.png') }}" alt="logo">
                        </div>
                    </div>
                </div>
                <div class="row pb-4">
                    <div class="col">
                        <div class="icons d-flex">
                            <i class="fa-brands fa-twitter mx-2"></i> 
                            <i class="fa-brands fa-linkedin mx-2"></i> 
                            <i class="fa-brands fa-youtube mx-2"></i> 
                            <i class="fa-brands fa-instagram mx-2"></i> 
                            <i class="fa-brands fa-pinterest mx-2"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="text-footer mb-4">
                            <strong>© FastBites • <a href="#" class="text-footer"> Cookie & Privacy Policy</a> • Developed by Team 4</strong>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
    </html>
    
    <style lang="scss" scoped>
.navbar .logo {
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
    
        .navbar-nav .nav-link {
            position: relative;
        }
    
        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #fff;
            transform-origin: right;
            transform: scaleX(0);
            transition: transform .3s ease-in-out;
        }
    
        .navbar-nav .nav-link:hover::before {
            transform-origin: left;
            transform: scaleX(1);
        }

footer {
  background-color: #F6901E;
  width: 100%;
  padding: 60px 0;
  bottom: 0; 
}

.text-footer {
  font-family: 'Open Sans', sans-serif;
  color: white;
  font-size: 0.9rem;
}

.logo-container {
  width: 120px;
  height: 120px;
  display: flex; 
  align-items: center; 
}

.logo {
  width: 100%;
}

.icons {
  width: 60px;
  display: flex;
  align-items: center;
}

.icons i {
  border-radius: 25%;
  background-color: white;
  width: 60px;
  height: 50px;
  padding: 16px; 
  border: 1px solid white;
  color: #F6901E;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: background-color 0.5s, color 0.5s;
  cursor: pointer;
}

.icons i:hover {
  background-color: #F6901E;
  color: white;
}

main {
    min-height: 400px;
}

</style>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page-title') | {{ config('app.name', 'Fastbites') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/faviconlogo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Paytone+One&display=swap" rel="stylesheet">



    <!-- Scripts -->
    @vite('resources/js/app.js')
</head>
<body class="background-container">
    <header>
        <nav class="navbar navbar-expand-lg mt-4 mb-3">
            <div class="container">
                <div class="logo">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="{{ asset('images/logoscritta.png') }}" alt="logo">
                    </a>
                </div>
                
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
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div>
            @yield('main-content')
        </div>
    </main>

    <main>
        <div>
            @yield('footer')
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

 </style>

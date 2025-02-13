<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <style>
            .nav-item-separator {
                border-left: 1px solid #ccc;
                margin-left: 15px;
                padding-left: 15px;
            }
        </style>
</head>

<body>
    <!-- As a heading -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            {{-- <a class="navbar-brand" href="{{ route('home') }}">CERTI-FINISH</a> --}}
            <a class="navbar-brand" href="{{ route('home') }}">E-SERTIFICATE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'participant.index' ? 'active' : '' }}" href="{{ route('participant.index') }}">Peserta</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ Route::currentRouteName() =='certificate.index' ? 'active' : '' }}" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sertifikasi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('certificate.index') }}">Data Sertifikat</a></li>
                            <li><a class="dropdown-item" href="{{ route('assesment.index') }}">Data Pengisian Sertifikat</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="float-right">
                @if (Auth::check())
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.index') }}">{{ Auth::user()->username }}</a>
                    </li>
                    <li class="nav-item nav-item-separator">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>

                @else
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm p-3 min-vh-100">
                <div class="container-fluid">

                    <!--begin:content-->
                    @yield('content')
                    <!--end::content-->

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>

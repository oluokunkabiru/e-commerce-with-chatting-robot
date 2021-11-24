{{-- <head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Soupe::@yield('title')</title>

    <!-- Google Font -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="icon" href="{{ asset('asset/img/logo.png') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/fontawesome-free/css/all.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- <link rel="stylesheet" href="../../../public/asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->

<body class="skin-blue fixed sidebar-mini sidebar-mini-expand-feature" style="height: auto; min-height: 100%;">
    <div class="wrapper">
        </head>

        <body class="skin-blue fixed sidebar-mini sidebar-mini-expand-feature" style="height: auto; min-height: 100%;">
            <div class="wrapper"> --}}
                <!-- Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                        </li>

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Login / Sign Up
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="#" data-toggle="modal" data-target="#exampleModal1"
                                    class="text-dark login_btn dropdown-item">
                                    {{ __('Login') }}</a>
                                {{-- <a class="dropdown-item" href="#"></a>  --}}
                                <a class="text-dark login_btn align-self-center mx-3" href="#myModal_btn"
                                    data-toggle="modal" data-target="#myModal_btn">
                                    {{ __('Register') }}</a>

                            </div>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('dashboard') }}">Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        @endif
                    </ul>
                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-auto">
                        <div class="input-group input-group-lg">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn  btn-primary" type="submit">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Right navbar links -->


                </nav>
                <!-- Main Sidebar Container -->

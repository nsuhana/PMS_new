<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <title>Sistem Pemantauan Kontrak</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ url('font-awesome-4.7.0/css/font-awesome.min.css') }}">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->

    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap.rtl.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-grid.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-grid.rtl.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-grid.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-reboot.rtl.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-reboot.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-utilities.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-utilities.min.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-utilities.rtl.css') }}">
    <link rel="stylesheet" href="{{ url('bootstrap-5.1.3/css/bootstrap-utilities.rtl.min.css') }}">

    @yield('stylesheet')

    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script type="text/javascript"
        src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
    {{-- javascript for table --}}
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


    {{-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}

    {{-- end javascript for table --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script> --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.tiny.cloud/1/95k1vc2l70l1mrd6dorvnciuusyrbz0jlp1umakamfvwe3ii/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
        html,
        body {
            font-family: 'Poppins';
            min-height: 55rem;
            font-size: 12px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins';
        }

        p {
            font-size: 12px;
            font-family: 'Poppins';
        }

        .addMargin {
            /* margin-left: 18rem; */
        }

        .bgCustom {
            /* background-color: #cff4fc; */
            background-color: #B0B0B0;
            /* background-color: rgb(237,242,249); */

        }

        .my-btn-primary {
            color: white;
            background-color: #EC5326;
            border-color: #EC5326;
        }

        .my-btn-primary-outline {
            color: #EC5326;
            border-color: #EC5326;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #EC5326;
            background: none ;
        }

    </style>
</head>

<body>

    <div class="d-flex flex-column">
        {{-- column 1 --}}
        <div class="d-flex justify-content-between align-items-center sticky-md-top flex-column flex-md-row"
            style="background-color: #262626; color: white;" style="box-shadow: 0 2px 2px -2px rgba(0,0,0,.2);">
            <div style="width:100%">
                <div class="d-flex align-items-center justify-content-center" style="width: 100%;">
                    <h5 class="m-2">SISTEM PENGURUSAN KONTRAK JABATAN PENGANGKUTAN JALAN (JPJ)</h5>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column">
            {{-- column 2 --}}
            <div class="d-flex flex-md-row flex-column justify-content-between"
                style="height: ; box-shadow: 0 2px 2px -2px rgba(0,0,0,.2);">
                {{-- logo and hamburger --}}
                <div class="d-flex flex-row">
                    <div class="m-2 d-flex">
                        <button class="navbar-toggler navbar-light " type="button" data-bs-toggle="collapse"
                            data-bs-target="#sidebarToggle" aria-controls="sidebarToggle" aria-expanded="true"
                            aria-label="Toggle navigation" href="#sidebarToggle" id="sidebarTrigger">
                            <span class="navbar-toggler-icon"></span></button>
                    </div>
                    <div class="m-2 d-flex">
                        <a id="website_logo" class="navbar-brand hide" href="/">
                            <img src="{{ url('/images/JPJ_Logo_w_txt.png') }}" height="80" />
                        </a>
                    </div>
                </div>
                {{-- search bar and etc --}}
                <div class="d-flex flex-row align-items-center justify-content-between" style="width: 100%">
                    {{-- Search Bar --}}
                    <div class="flex-shrink-0 d-none d-md-block" style="width: 400px; margin-left: 100px;">
                        <form action="/search" method="POST">
                            @csrf
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <input id="search" class="form-control" type="text" placeholder="{{ __('Cari...') }}"
                                aria-label="Search" name="keyword" id="keyword" style="max-width: 100%; height: 50px;">
                        </form>
                    </div>
                    {{-- avatar dropdown --}}
                    <div class="d-flex align-items-center flex-column flex-md-row">
                        <div class="dropdown mx-2">
                            <button class="btn dropdown-toggle text-uppercase" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Config::get('app.locale') }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="/en">EN ({{ __('Inggeris') }})</a></li>
                                <li><a class="dropdown-item" href="/my">MY ({{ __('Bahasa Melayu') }})</a></li>
                            </ul>
                        </div>
                        @if (Route::has('login'))
                            @auth
                                <div class="dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuButton" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        @if (Auth::user()->profile->profile_pic)
                                            <img src="{{ url('images/' . Auth::user()->profile->profile_pic) }}"
                                                width="40" height="40" class="rounded-circle" alt="">
                                        @else
                                            <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg"
                                                width="40" height="40" class="rounded-circle" alt="">
                                        @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuButton"
                                        style="text-align: left;">
                                        <a class="dropdown-item"
                                            href="/user/{{ Auth::user()->id }}">{{ __('Profil') }}</a>
                                        <a class="dropdown-item"
                                            href="/user/{{ Auth::user()->id }}/tukar-kata-laluan">{{ __('Tukar Kata Laluan') }}</a>
                                        <div class="dropdown-divider"></div>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button class="dropdown-item" type="submit">{{ __('Log Keluar') }}</button>
                                        </form>
                                        @if (Auth::user()->isAdministrator())
                                            <div class="dropdown-divider"></div>
                                            <a href="/admin" class="dropdown-item">
                                                <span class="btn btn-outline-secondary">
                                                    {{ __('Laman Admin') }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-box-arrow-up-right"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z" />
                                                        <path fill-rule="evenodd"
                                                            d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z" />
                                                    </svg>
                                                </span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="d-flex justify-content-between mb-2 m-md-0">
                                    <a href="/login" class="mx-1 btn my-btn-primary">{{ __('Log Masuk') }}</a>
                                    <a href="/register"
                                        class="mx-1 btn my-btn-primary-outline">{{ __('Buat Akaun') }}</a>
                                </div>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
            {{-- column 3 --}}
            <div class="d-flex flex-md-row flex-column">
                <div id="sidebarToggle" class="collapse show width mx-4" style="height: auto;">
                    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 240px;" id="sidebar-wrapper">
                        <ul class="d-flex flex-column nav nav-pills mb-auto overflow-auto">
                            @if (Route::has('login'))
                                <li>
                                    <a href="/" class="nav-link link-dark active">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                            <path fill-rule="evenodd"
                                                d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                        </svg>
                                        <span class="m-3">
                                            {{ __('Halaman Utama') }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/search/home" class="nav-link link-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                        </svg>
                                        <span class="m-3">
                                            {{ __('Cari Projek') }}
                                        </span>
                                    </a>
                                </li>
                                @auth
                                    @if (Auth::user()->isNotNormalUser())
                                        <li>
                                            <a href="/projek" class="nav-link link-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                                                    <path
                                                        d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a1.99 1.99 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4H2.19zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139C1.72 3.042 1.95 3 2.19 3h5.396l-.707-.707z" />
                                                </svg>
                                                <span class="m-3">
                                                    {{ __('Projek') }}
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/projek/create" class="nav-link link-dark">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                                    <path
                                                        d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                                <span class="m-3">
                                                    {{ __('Tambah Projek Baru') }}
                                                </span>
                                            </a>
                                        </li>
                                    @endif
                                @endauth
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="" style="width: 100%; height: 500px;">
                    {{-- <div class="container addMargin"> --}}
                        {{-- <div class="container-fluid"> --}}
                            <div class="m-5">
                                @yield('content')
                            </div>
                        {{-- </div> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

</body>

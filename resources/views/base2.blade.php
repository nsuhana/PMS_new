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

        .my-bg-primary {
            --bs-bg-opacity: 1;
            background-color: #2E3192;
        }

        .my-text-primary {
            color: #EC5326;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #EC5326;
            background: none;
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
                    <h5 class="m-2">SISTEM PEMANTAUAN KONTRAK</h5>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column">
            {{-- column 2 --}}
            <div class="d-flex flex-row justify-content-between"
                style="height: ; box-shadow: 0 2px 2px -2px rgba(0,0,0,.2);">
                {{-- logo --}}
                <div class="d-flex flex-row mx-5">
                    <div class="m-2 d-flex">
                        <a id="website_logo" class="navbar-brand hide" href="/">
                            <img src="{{ url('/images/JPJ_Logo_w_txt.png') }}" height="80" />
                        </a>
                    </div>
                </div>
                {{-- avatar dropdown --}}
                <div class="d-flex align-items-center flex-column flex-md-row" style="margin-right: 50px;">
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
                                        <img src="{{ url('images/' . Auth::user()->profile->profile_pic) }}" width="40"
                                            height="40" class="rounded-circle" alt="">
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
                                <a href="/register" class="mx-1 btn my-btn-primary-outline">{{ __('Buat Akaun') }}</a>
                            </div>
                        @endauth
                    @endif
                </div>
            </div>
            {{-- column 3 --}}
            @yield('content')
        </div>
    </div>

</body>

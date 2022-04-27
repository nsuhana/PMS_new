<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <title></title>

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

    {{-- javascript for table --}}
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    {{-- end javascript for table --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script> --}}

    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.tiny.cloud/1/95k1vc2l70l1mrd6dorvnciuusyrbz0jlp1umakamfvwe3ii/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <style>
        html,
        body {
            font-family: 'Arial';
            min-height: 55rem;
            font-size: 12px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Arial';
        }



        p {
            font-size: 14px;
            font-family: 'Arial';
        }

        .addMargin {
            /* margin-left: 18rem; */
        }

        .bgCustom {
            /* background-color: #121212; */
        }

        .bgCustom2 {
            background-color: #417690;
        }

        .bgCustom3 {
            /* background-color: #121212; */
        }

        .a_link_nav {
            color: #bcccd3;
        }

        .a_link_nav:hover {
            color: white;
        }

        .textCustomColor2 {
            color: #417690;
        }
    </style>

    <style>
        /* Style the list */
        ul.breadcrumb {
            padding: 10px 16px;
            list-style: none;
            /* background-color: #eee; */
        }

        /* Display list items side by side */
        ul.breadcrumb li {
            display: inline;
            font-size: 12px;
        }

        /* Add a slash symbol (/) before/behind each list item */
        ul.breadcrumb li+li:before {
            padding: 8px;
            color: black;
            content: "/\00a0";
        }

        /* Add a color to all links inside the list */
        ul.breadcrumb li a {
            color: #0275d8;
            text-decoration: none;
        }

        /* Add a color on mouse-over */
        ul.breadcrumb li a:hover {
            color: #01447e;
            text-decoration: underline;
        }
    </style>
</head>

<body class="bg-light">

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->

    <div class="container-fluid vh-100 bgCustom3 px-0">

        <div class="d-flex justify-content-between align-items-center sticky-top bgCustom2 px-5 py-3" height="40"
            style="box-shadow: 0 2px 2px -2px rgba(0,0,0,.2);">

            {{-- Navbar brand --}}

            <div class="d-flex align-items-center">
                <a class="navbar-brand text-decoration-none" style="color: #CAC66F;" href="/admin">
                    <h3>ADMINISTRATION SITE</h3>
                </a>
            </div>

            {{-- Top Navbar --}}
            <div class="d-flex align-items-center">
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <h5>
                                <a class="text-decoration-none a_link_nav px-3" href="/">View Site</a>
                            </h5>
                        </li>
                        <li class="nav-item">
                            <h5>
                                <a class="text-decoration-none a_link_nav px-3" href="/admin/user/{{Auth::user()->id}}">Edit Profile</a>
                            </h5>
                        </li>
                        <li class="nav-item">
                            <h5>
                                <a class="text-decoration-none a_link_nav px-3" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                    Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </h5>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        @yield('content')

    </div>

</body>

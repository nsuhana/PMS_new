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

    </style>
</head>

<body class="bgCustom">

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->

    <div class="container h-100">

        <div class="d-flex flex-column">

            <div class="d-flex justify-content-between align-items-center sticky-md-top bgCustom flex-column flex-md-row"
                style="height: ; box-shadow: 0 2px 2px -2px rgba(0,0,0,.2);">
                <div style="width:100%">
                    <div class="d-flex align-items-center justify-content-center" style="width: 100%;">

                        <h1 class="m-4">SISTEM PEMANTAUAN KONTRAK</h1>

                        <!--<a id="website_logo" class="navbar-brand hide" href="/">
              {{-- WEBSITE LOGO --}}
              {{-- <svg id="logo-43" width="160" height="30" viewBox="0 0 160 30" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M38.5656 1.27465H42.5603V23.0637H49.1333V26.6953H38.5656V1.27465Z" fill="#726BEA"
                  class="ccompli1">
                </path>
                <path
                  d="M56.6812 27.0584C54.7202 27.0584 53.2192 26.5016 52.1781 25.3879C51.1371 24.2742 50.6166 22.7006 50.6166 20.6669V7.30297C50.6166 5.26932 51.1371 3.69566 52.1781 2.582C53.2192 1.46833 54.7202 0.911499 56.6812 0.911499C58.6422 0.911499 60.1432 1.46833 61.1843 2.582C62.2253 3.69566 62.7458 5.26932 62.7458 7.30297V20.6669C62.7458 22.7006 62.2253 24.2742 61.1843 25.3879C60.1432 26.5016 58.6422 27.0584 56.6812 27.0584ZM56.6812 23.4269C58.0612 23.4269 58.7512 22.5916 58.7512 20.9211V7.04876C58.7512 5.37826 58.0612 4.54301 56.6812 4.54301C55.3012 4.54301 54.6112 5.37826 54.6112 7.04876V20.9211C54.6112 22.5916 55.3012 23.4269 56.6812 23.4269Z"
                  fill="#726BEA" class="ccompli1"></path>
                <path
                  d="M71.1125 27.0584C69.1757 27.0584 67.6989 26.5137 66.682 25.4242C65.6652 24.3106 65.1568 22.7248 65.1568 20.6669V7.30297C65.1568 5.24511 65.6652 3.67145 66.682 2.582C67.6989 1.46833 69.1757 0.911499 71.1125 0.911499C73.0493 0.911499 74.5261 1.46833 75.5429 2.582C76.5598 3.67145 77.0682 5.24511 77.0682 7.30297V9.48187H73.2914V7.04876C73.2914 5.37826 72.6014 4.54301 71.2214 4.54301C69.8415 4.54301 69.1515 5.37826 69.1515 7.04876V20.9575C69.1515 22.6038 69.8415 23.4269 71.2214 23.4269C72.6014 23.4269 73.2914 22.6038 73.2914 20.9575V15.9823H71.2941V12.3508H77.0682V20.6669C77.0682 22.7248 76.5598 24.3106 75.5429 25.4242C74.5261 26.5137 73.0493 27.0584 71.1125 27.0584Z"
                  fill="#726BEA" class="ccompli1"></path>
                <path
                  d="M85.407 27.0584C83.446 27.0584 81.945 26.5016 80.904 25.3879C79.8629 24.2742 79.3424 22.7006 79.3424 20.6669V7.30297C79.3424 5.26932 79.8629 3.69566 80.904 2.582C81.945 1.46833 83.446 0.911499 85.407 0.911499C87.3681 0.911499 88.8691 1.46833 89.9101 2.582C90.9512 3.69566 91.4717 5.26932 91.4717 7.30297V20.6669C91.4717 22.7006 90.9512 24.2742 89.9101 25.3879C88.8691 26.5016 87.3681 27.0584 85.407 27.0584ZM85.407 23.4269C86.787 23.4269 87.477 22.5916 87.477 20.9211V7.04876C87.477 5.37826 86.787 4.54301 85.407 4.54301C84.0271 4.54301 83.3371 5.37826 83.3371 7.04876V20.9211C83.3371 22.5916 84.0271 23.4269 85.407 23.4269Z"
                  fill="#726BEA" class="ccompli1"></path>
                <path d="M94.1808 1.27465H98.1755V26.6953H94.1808V1.27465Z" fill="#4F46E5" class="ccustom"></path>
                <path
                  d="M101.167 1.27465H107.05C109.035 1.27465 110.524 1.80727 111.517 2.87252C112.51 3.93776 113.006 5.49931 113.006 7.55717V10.0629C113.006 12.1208 112.51 13.6823 111.517 14.7476C110.524 15.8128 109.035 16.3454 107.05 16.3454H105.162V26.6953H101.167V1.27465ZM107.05 12.7139C107.704 12.7139 108.188 12.5323 108.503 12.1692C108.842 11.806 109.011 11.1887 109.011 10.3171V7.30297C109.011 6.4314 108.842 5.81404 108.503 5.45089C108.188 5.08774 107.704 4.90617 107.05 4.90617H105.162V12.7139H107.05Z"
                  fill="#4F46E5" class="ccustom"></path>
                <path
                  d="M120.51 27.0584C118.574 27.0584 117.109 26.5137 116.116 25.4242C115.124 24.3106 114.627 22.7248 114.627 20.6669V19.2143H118.404V20.9575C118.404 22.6038 119.094 23.4269 120.474 23.4269C121.152 23.4269 121.66 23.2332 121.999 22.8459C122.362 22.4343 122.544 21.7806 122.544 20.8848C122.544 19.8196 122.302 18.8875 121.818 18.0886C121.334 17.2654 120.438 16.2849 119.13 15.147C117.484 13.6944 116.334 12.3871 115.68 11.225C115.027 10.0387 114.7 8.70715 114.7 7.23034C114.7 5.2209 115.208 3.67145 116.225 2.582C117.242 1.46833 118.719 0.911499 120.656 0.911499C122.568 0.911499 124.009 1.46833 124.977 2.582C125.97 3.67145 126.466 5.24511 126.466 7.30297V8.35611H122.689V7.04876C122.689 6.1772 122.52 5.54773 122.181 5.16037C121.842 4.7488 121.346 4.54301 120.692 4.54301C119.36 4.54301 118.695 5.35405 118.695 6.97613C118.695 7.89611 118.937 8.75557 119.421 9.5545C119.929 10.3534 120.837 11.3218 122.145 12.4597C123.815 13.9123 124.965 15.2318 125.595 16.4181C126.224 17.6044 126.539 18.9964 126.539 20.5943C126.539 22.6764 126.018 24.2742 124.977 25.3879C123.96 26.5016 122.471 27.0584 120.51 27.0584Z"
                  fill="#4F46E5" class="ccustom"></path>
                <path
                  d="M134.64 27.0584C132.703 27.0584 131.226 26.5137 130.209 25.4242C129.192 24.3106 128.684 22.7248 128.684 20.6669V1.27465H132.679V20.9575C132.679 21.829 132.848 22.4585 133.187 22.8459C133.55 23.2332 134.059 23.4269 134.712 23.4269C135.366 23.4269 135.862 23.2332 136.201 22.8459C136.564 22.4585 136.746 21.829 136.746 20.9575V1.27465H140.595V20.6669C140.595 22.7248 140.087 24.3106 139.07 25.4242C138.053 26.5137 136.576 27.0584 134.64 27.0584Z"
                  fill="#4F46E5" class="ccustom"></path>
                <path
                  d="M143.44 1.27465H149.142L151.684 19.4685H151.756L154.299 1.27465H160V26.6953H156.223V7.44823H156.151L153.245 26.6953H149.904L146.999 7.44823H146.927V26.6953H143.44V1.27465Z"
                  fill="#4F46E5" class="ccustom"></path>
                <path
                  d="M0 26.6953C4.91448 26.6953 8.89841 22.7113 8.89841 17.7969C8.89841 12.8824 4.91448 8.89844 0 8.89844V15.1273C1.47433 15.1273 2.66951 16.3225 2.66951 17.7969C2.66951 19.2712 1.47433 20.4664 0 20.4664V26.6953Z"
                  fill="#726BEA" class="ccompli1"></path>
                <path
                  d="M29.6614 11.8646C28.1408 11.3829 26.5215 11.123 24.8414 11.123C16.0363 11.123 8.89844 18.261 8.89844 27.066C8.89844 27.9498 8.97036 28.8168 9.10862 29.6614H19.0145C18.6609 28.8686 18.4643 27.9903 18.4643 27.066C18.4643 23.544 21.3194 20.6888 24.8414 20.6888C26.7664 20.6888 28.4921 21.5417 29.6614 22.8902V11.8646Z"
                  fill="#A5B4FC" class="ccompli2"></path>
                <path
                  d="M1.56451 0C2.30225 6.67374 7.9603 11.8646 14.8307 11.8646C21.701 11.8646 27.3591 6.67374 28.0968 0H18.5513C17.962 1.4773 16.5182 2.52121 14.8307 2.52121C13.1431 2.52121 11.6994 1.4773 11.11 0H1.56451Z"
                  fill="#4F46E5" class="ccustom"></path>
              </svg> --}}
              <img src="{{ url('/images/JPJ_Logo.png') }}" height="60"/>
            </a>-->
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center sticky-md-top bgCustom flex-column flex-md-row"
                style="height: ; box-shadow: 0 2px 2px -2px rgba(0,0,0,.2);">
                <div>
                    <div class="d-flex align-items-center" style="width: 240px;">
                        <div class="m-2 d-flex">
                            <button class="navbar-toggler navbar-light " type="button" data-bs-toggle="collapse"
                                data-bs-target="#sidebarToggle" aria-controls="sidebarToggle" aria-expanded="true"
                                aria-label="Toggle navigation" href="#sidebarToggle" id="sidebarTrigger">
                                <span class="navbar-toggler-icon"></span></button>
                        </div>
                        <a id="website_logo" class="navbar-brand hide" href="/">
                            {{-- WEBSITE LOGO --}}
                            {{-- <svg id="logo-43" width="160" height="30" viewBox="0 0 160 30" fill="none"
              xmlns="http://www.w3.org/2000/svg">
              <path d="M38.5656 1.27465H42.5603V23.0637H49.1333V26.6953H38.5656V1.27465Z" fill="#726BEA"
                class="ccompli1">
              </path>
              <path
                d="M56.6812 27.0584C54.7202 27.0584 53.2192 26.5016 52.1781 25.3879C51.1371 24.2742 50.6166 22.7006 50.6166 20.6669V7.30297C50.6166 5.26932 51.1371 3.69566 52.1781 2.582C53.2192 1.46833 54.7202 0.911499 56.6812 0.911499C58.6422 0.911499 60.1432 1.46833 61.1843 2.582C62.2253 3.69566 62.7458 5.26932 62.7458 7.30297V20.6669C62.7458 22.7006 62.2253 24.2742 61.1843 25.3879C60.1432 26.5016 58.6422 27.0584 56.6812 27.0584ZM56.6812 23.4269C58.0612 23.4269 58.7512 22.5916 58.7512 20.9211V7.04876C58.7512 5.37826 58.0612 4.54301 56.6812 4.54301C55.3012 4.54301 54.6112 5.37826 54.6112 7.04876V20.9211C54.6112 22.5916 55.3012 23.4269 56.6812 23.4269Z"
                fill="#726BEA" class="ccompli1"></path>
              <path
                d="M71.1125 27.0584C69.1757 27.0584 67.6989 26.5137 66.682 25.4242C65.6652 24.3106 65.1568 22.7248 65.1568 20.6669V7.30297C65.1568 5.24511 65.6652 3.67145 66.682 2.582C67.6989 1.46833 69.1757 0.911499 71.1125 0.911499C73.0493 0.911499 74.5261 1.46833 75.5429 2.582C76.5598 3.67145 77.0682 5.24511 77.0682 7.30297V9.48187H73.2914V7.04876C73.2914 5.37826 72.6014 4.54301 71.2214 4.54301C69.8415 4.54301 69.1515 5.37826 69.1515 7.04876V20.9575C69.1515 22.6038 69.8415 23.4269 71.2214 23.4269C72.6014 23.4269 73.2914 22.6038 73.2914 20.9575V15.9823H71.2941V12.3508H77.0682V20.6669C77.0682 22.7248 76.5598 24.3106 75.5429 25.4242C74.5261 26.5137 73.0493 27.0584 71.1125 27.0584Z"
                fill="#726BEA" class="ccompli1"></path>
              <path
                d="M85.407 27.0584C83.446 27.0584 81.945 26.5016 80.904 25.3879C79.8629 24.2742 79.3424 22.7006 79.3424 20.6669V7.30297C79.3424 5.26932 79.8629 3.69566 80.904 2.582C81.945 1.46833 83.446 0.911499 85.407 0.911499C87.3681 0.911499 88.8691 1.46833 89.9101 2.582C90.9512 3.69566 91.4717 5.26932 91.4717 7.30297V20.6669C91.4717 22.7006 90.9512 24.2742 89.9101 25.3879C88.8691 26.5016 87.3681 27.0584 85.407 27.0584ZM85.407 23.4269C86.787 23.4269 87.477 22.5916 87.477 20.9211V7.04876C87.477 5.37826 86.787 4.54301 85.407 4.54301C84.0271 4.54301 83.3371 5.37826 83.3371 7.04876V20.9211C83.3371 22.5916 84.0271 23.4269 85.407 23.4269Z"
                fill="#726BEA" class="ccompli1"></path>
              <path d="M94.1808 1.27465H98.1755V26.6953H94.1808V1.27465Z" fill="#4F46E5" class="ccustom"></path>
              <path
                d="M101.167 1.27465H107.05C109.035 1.27465 110.524 1.80727 111.517 2.87252C112.51 3.93776 113.006 5.49931 113.006 7.55717V10.0629C113.006 12.1208 112.51 13.6823 111.517 14.7476C110.524 15.8128 109.035 16.3454 107.05 16.3454H105.162V26.6953H101.167V1.27465ZM107.05 12.7139C107.704 12.7139 108.188 12.5323 108.503 12.1692C108.842 11.806 109.011 11.1887 109.011 10.3171V7.30297C109.011 6.4314 108.842 5.81404 108.503 5.45089C108.188 5.08774 107.704 4.90617 107.05 4.90617H105.162V12.7139H107.05Z"
                fill="#4F46E5" class="ccustom"></path>
              <path
                d="M120.51 27.0584C118.574 27.0584 117.109 26.5137 116.116 25.4242C115.124 24.3106 114.627 22.7248 114.627 20.6669V19.2143H118.404V20.9575C118.404 22.6038 119.094 23.4269 120.474 23.4269C121.152 23.4269 121.66 23.2332 121.999 22.8459C122.362 22.4343 122.544 21.7806 122.544 20.8848C122.544 19.8196 122.302 18.8875 121.818 18.0886C121.334 17.2654 120.438 16.2849 119.13 15.147C117.484 13.6944 116.334 12.3871 115.68 11.225C115.027 10.0387 114.7 8.70715 114.7 7.23034C114.7 5.2209 115.208 3.67145 116.225 2.582C117.242 1.46833 118.719 0.911499 120.656 0.911499C122.568 0.911499 124.009 1.46833 124.977 2.582C125.97 3.67145 126.466 5.24511 126.466 7.30297V8.35611H122.689V7.04876C122.689 6.1772 122.52 5.54773 122.181 5.16037C121.842 4.7488 121.346 4.54301 120.692 4.54301C119.36 4.54301 118.695 5.35405 118.695 6.97613C118.695 7.89611 118.937 8.75557 119.421 9.5545C119.929 10.3534 120.837 11.3218 122.145 12.4597C123.815 13.9123 124.965 15.2318 125.595 16.4181C126.224 17.6044 126.539 18.9964 126.539 20.5943C126.539 22.6764 126.018 24.2742 124.977 25.3879C123.96 26.5016 122.471 27.0584 120.51 27.0584Z"
                fill="#4F46E5" class="ccustom"></path>
              <path
                d="M134.64 27.0584C132.703 27.0584 131.226 26.5137 130.209 25.4242C129.192 24.3106 128.684 22.7248 128.684 20.6669V1.27465H132.679V20.9575C132.679 21.829 132.848 22.4585 133.187 22.8459C133.55 23.2332 134.059 23.4269 134.712 23.4269C135.366 23.4269 135.862 23.2332 136.201 22.8459C136.564 22.4585 136.746 21.829 136.746 20.9575V1.27465H140.595V20.6669C140.595 22.7248 140.087 24.3106 139.07 25.4242C138.053 26.5137 136.576 27.0584 134.64 27.0584Z"
                fill="#4F46E5" class="ccustom"></path>
              <path
                d="M143.44 1.27465H149.142L151.684 19.4685H151.756L154.299 1.27465H160V26.6953H156.223V7.44823H156.151L153.245 26.6953H149.904L146.999 7.44823H146.927V26.6953H143.44V1.27465Z"
                fill="#4F46E5" class="ccustom"></path>
              <path
                d="M0 26.6953C4.91448 26.6953 8.89841 22.7113 8.89841 17.7969C8.89841 12.8824 4.91448 8.89844 0 8.89844V15.1273C1.47433 15.1273 2.66951 16.3225 2.66951 17.7969C2.66951 19.2712 1.47433 20.4664 0 20.4664V26.6953Z"
                fill="#726BEA" class="ccompli1"></path>
              <path
                d="M29.6614 11.8646C28.1408 11.3829 26.5215 11.123 24.8414 11.123C16.0363 11.123 8.89844 18.261 8.89844 27.066C8.89844 27.9498 8.97036 28.8168 9.10862 29.6614H19.0145C18.6609 28.8686 18.4643 27.9903 18.4643 27.066C18.4643 23.544 21.3194 20.6888 24.8414 20.6888C26.7664 20.6888 28.4921 21.5417 29.6614 22.8902V11.8646Z"
                fill="#A5B4FC" class="ccompli2"></path>
              <path
                d="M1.56451 0C2.30225 6.67374 7.9603 11.8646 14.8307 11.8646C21.701 11.8646 27.3591 6.67374 28.0968 0H18.5513C17.962 1.4773 16.5182 2.52121 14.8307 2.52121C13.1431 2.52121 11.6994 1.4773 11.11 0H1.56451Z"
                fill="#4F46E5" class="ccustom"></path>
            </svg> --}}
                            <img src="{{ url('/images/JPJ_Logo.png') }}" height="60" />
                        </a>
                    </div>
                </div>
                <div style="width: 100%;">
                    {{-- Top Navbar --}}
                    <div class="d-flex justify-content-between align-items-center flex-column flex-md-row"
                        style="height: 100%;">
                        <div class="empty__bar" style="width: 50px;"></div>
                        {{-- Search Bar --}}
                        <div style="width: 200px;" class="flex-shrink-0">
                            <form action="/search" method="POST">
                                @csrf
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <input id="search" class="form-control rounded-pill" type="text"
                                    placeholder="{{ __('Cari...') }}" aria-label="Search" name="keyword" id="keyword"
                                    style="max-width: 100%;">
                            </form>
                        </div>
                        {{-- Dropdown Avatar --}}
                        <div class="d-flex align-items-center flex-column flex-md-row">
                            <div class="dropdown mx-2">
                                <button class="btn dropdown-toggle text-uppercase" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="navbarDropdownMenuButton" style="text-align: left;">
                                            <a class="dropdown-item"
                                                href="/user/{{ Auth::user()->id }}">{{ __('Profil') }}</a>
                                            <a class="dropdown-item"
                                                href="/user/{{ Auth::user()->id }}/tukar-kata-laluan">{{ __('Tukar Kata Laluan') }}</a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item"
                                                    type="submit">{{ __('Log Keluar') }}</button>
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
                                        <a href="/login" class="mx-1 btn btn-primary">{{ __('Log Masuk') }}</a>
                                        <a href="/register"
                                            class="mx-1 btn btn-outline-primary">{{ __('Buat Akaun') }}</a>
                                    </div>
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="d-flex flex-md-row flex-column">
                    {{-- Sidebar --}}
                    <div id="sidebarToggle" class="collapse show" style="height: auto;">
                        <div>
                            <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 240px;"
                                id="sidebar-wrapper">
                                <ul class="d-flex flex-column nav nav-pills mb-auto overflow-auto">
                                    @if (Route::has('login'))
                                        <li>
                                            <a href="/" class="nav-link" aria-current="page" style="color: blue;">
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
                                                            fill="currentColor" class="bi bi-plus-square"
                                                            viewBox="0 0 16 16">
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
                    </div>
                    <div class="" style="width: 100%;">
                        <div class="container addMargin">
                            <div class="container-fluid">
                                <div class="m-2">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    {{-- <script type="text/javascript" src={{ url('bootstrap-5.1.3/js/bootstrap.bundle.js') }}></script>
  <script type="text/javascript" src={{ url('bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}></script> --}}
    {{-- <script type="text/javascript" src={{ url('bootstrap-5.1.3/js/bootstrap.esm.js') }}></script> --}}
    {{-- <script type="text/javascript" src={{ url('bootstrap-5.1.3/js/bootstrap.esm.min.js') }}></script> --}}
    {{-- <script type="text/javascript" src={{ url('bootstrap-5.1.3/js/bootstrap.js') }}></script>
  <script type="text/javascript" src={{ url('bootstrap-5.1.3/js/bootstrap.min.js') }}></script> --}}

</body>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "{{ env('APP_NAME') }}")</title>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('asset/vendor/bootstrap/css/nucleo-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/bootstrap/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="icon" type="svg" href="{{ asset('svg/logo-no-background.svg') }}">
    <link id="pagestyle" href="{{ asset('asset/vendor/bootstrap/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/vendor/bootstrap/icon/font/bootstrap-icons.min.css') }}">
</head>

<body class="g-sidenav-show bg-gray-100" style="font-family: 'Roboto', serif;">
<div class="min-height-150 bg-primary position-absolute w-100"></div>
@include('components.side-nav-bar')
<main class="main-content position-relative border-radius-lg ">
    @yield('content')
    <hr class="horizontal dark">
    @include('components.footer')
</main>
<script src="{{ asset('asset/vendor/bootstrap/js/core/popper.min.js')}}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/core/bootstrap.min.js')}}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/plugins/chartjs.min.js')}}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{ asset('asset/vendor/bootstrap/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>

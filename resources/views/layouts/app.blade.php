<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "{{ env('APP_NAME') }}")</title>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="{{ asset('asset/vendor/bootstrap/css/nucleo-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/vendor/bootstrap/css/nucleo-svg.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="icon" type="svg" href="{{ asset('svg/logo-no-background.svg') }}">
    <link id="pagestyle" href="{{ asset('asset/vendor/bootstrap/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('asset/vendor/bootstrap/icon/font/bootstrap-icons.min.css') }}">
</head>

<body style="font-family: 'Montserrat', sans-serif; background-color: #f6f9ff">
    @yield('content')
    <script src="{{ asset('asset/vendor/bootstrap/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="{{ asset('asset/vendor/bootstrap/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
</body>

</html>

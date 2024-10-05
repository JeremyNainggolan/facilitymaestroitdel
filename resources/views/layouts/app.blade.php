<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', "{{ env('APP_NAME') }}")</title>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Krona+One&display=swap" rel="stylesheet">
    <link rel="icon" type="svg" href="{{ asset('svg/logo-no-background.svg') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/vendor/bootstrap/icon/font/bootstrap-icons.min.css') }}">
</head>

<body class="bg-light">
    @yield('content')
    <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>

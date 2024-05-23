<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style_navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_responsive_home.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/82ebf8392e.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/trix.css') }}">
    <script type="text/javascript" src="{{ asset('js/trix.js') }}"></script>
    <style media="screen">
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
    <title>Gekraf Sumbar</title>
</head>

<body>
    @include('user.layouts.navbar')


    @yield('content')

</body>

</html>

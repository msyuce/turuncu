<!-- resources/views/layouts/auth.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{ config('app.company.name', 'app.designer.name') }} - @yield('title', 'Login') </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="Admin, Dashboard, Bootstrap" />
    <link rel="shortcut icon" sizes="196x196" href="{{ asset('assets/images/logo.png') }}" />

    <!-- CSS Dosyaları -->
    <link rel="stylesheet" href="{{ asset('libs/bower/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/bower/material-design-iconic-font/dist/css/material-design-iconic-font.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('libs/bower/animate.css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/misc-pages.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900,300" rel="stylesheet" />
</head>
<body class="simple-page">

    <div class="simple-page-wrap">
        <!-- Burada sayfaya özel içerik gelecek -->
        @yield('content')
    </div>

    <!-- JS Dosyaları -->
    <script src="{{ asset('assets/js/library.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/core.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>

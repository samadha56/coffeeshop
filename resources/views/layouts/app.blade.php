<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/png">
</head>

<body>
    <div class="container-fluid main-container p-0">
        @yield('content')
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

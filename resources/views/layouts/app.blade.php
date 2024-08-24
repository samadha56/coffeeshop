<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css?v=2') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/png">
</head>

<body>
    <div id="loading-screen">
        <img src="{{ asset('images/logo.jpg') }}" alt="Loading Logo">
    </div>
    <div class="container-fluid main-container p-0">
        @yield('content')
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script>
            window.addEventListener('load', function() {
                const loadingScreen = document.getElementById('loading-screen');
                const mainContainer = document.querySelector('.main-container');

                setTimeout(function() {
                    loadingScreen.style.opacity = '0';
                    setTimeout(function() {
                        loadingScreen.style.display = 'none';
                        mainContainer.style.display = 'flex';
                    }, 500);
                }, 1000);
            });

            document.addEventListener('DOMContentLoaded', function() {
                const links = document.querySelectorAll('a');
                const loadingScreen = document.getElementById('loading-screen');

                links.forEach(function(link) {
                    link.addEventListener('click', function(event) {
                        event.preventDefault();
                        loadingScreen.style.display = 'flex';
                        loadingScreen.style.opacity = '1';
                        const href = this.href;

                        setTimeout(function() {
                            window.location.href = href;
                        }, 500);
                    });
                });
            });
        </script>
</body>

</html>

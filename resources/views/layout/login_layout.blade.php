<!doctype html>
<html lang="sk">
<head>
    @include('layout.partials.head')
    <link rel="stylesheet" href="{{asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
<header>
    <div class="container top-nav">
        <div class="row m-0 align-items-center">
            <a href="{{ url('') }}" class="col-12 logo">
                <img src="{{ asset('assets/logo.svg') }}" alt="Logo" width="1px" height="100px" class="logo-small">
            </a>
        </div>
    </div>
</header>
@yield('content')

<!-- Bootstrap core JavaScript -->
<footer>
    @include('layout.partials.footer');
</footer>

</body>
</html>

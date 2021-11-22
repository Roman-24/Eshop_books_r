<!doctype html>
<html lang="sk">
<head>
    @include('layout.partials.head')
</head>

<body>
@include('layout.partials.header')

<div class="container">
    <div class="row">
        <main class="col-12 col-lg-12">
            @yield('content')
        </main>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<footer>
    @include('layout.partials.footer');
</footer>
</body>
</html>

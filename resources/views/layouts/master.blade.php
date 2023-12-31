<!DOCTYPE html>
<html lang="lt">
<head>
    {{--bootstrap--}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>@yield('title')</title>

</head>
<body>
<header>
    @if (Auth::check())
        <a href="{{ route('logout') }}">
            <button>Atsijungti</button>
        </a>
    @else
        <a href="{{ route('login') }}">
            <button>Prisijungti</button>
        </a>

        <a href="{{ route('register') }}">
            <button>Registruotis</button>
        </a>
    @endif
    <!-- Your header content goes here -->
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Your footer content goes here -->
</footer>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Add your additional JavaScript files here -->
</body>
</html>

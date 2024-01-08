<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>


    <!-- Add your CSS and other meta tags here -->
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

<!-- Add your JavaScript files here -->
</body>
</html>

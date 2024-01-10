<!DOCTYPE html>
<html lang="lt">
<head>
    {{--bootstrap--}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
{{--    <link href="../../css/app.css" rel="stylesheet">--}}
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>
<header>
    @if (Auth::check())
        <div>
            <p>Esate prisijungęs kaip: {{ Auth::user()->vardas}}</p>
        </div>
        <a href="{{ route('logout') }}">
            <button>Atsijungti</button>
        </a>

        <a href="{{ route('skolinimaisi') }}">
            <button>Mano skolinimaisi</button>
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
        <p>© 2024 Gerda Tumelytė</p>
        <p>T120B145 Kompiuterių tinklai ir internetinės technologijos</p>
    </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Add your additional JavaScript files here -->
</body>
</html>

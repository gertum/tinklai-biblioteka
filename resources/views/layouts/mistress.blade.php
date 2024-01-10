<!DOCTYPE html>
<html lang="lt">
<head>
    {{--bootstrap--}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
</head>

<header>
    <a href="{{ route('knygos') }}">
        <button>Knygų sąrašas</button>
    </a>
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

</html>

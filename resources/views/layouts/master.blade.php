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

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Atsijungti</button>
        </form>


        <a href="{{ route('skolinimaisi') }}">
            <button>Mano skolinimaisi</button>
        </a>
        <a href="{{ route('zinutes') }}">
            <button>Mano žinutės</button>
        </a>

        @if(Auth::user()->role->pavadinimas === 'Bibliotekininkas' || Auth::user()->role->pavadinimas === 'Administratorius')
            {{--        aš turiu daug galios--}}
            <a href="{{ route('visi-skolinimaisi') }}">
                <button>Visi skolinimaisi</button>
            </a>
        @endif
        @if(Auth::user()->role->pavadinimas === 'Administratorius')
            <a href="{{ route('register-librarian') }}">
                <button>Registruoti bibliotekininką</button>
            </a>
        @endif
    @else
        <div>
        <a href="{{ route('login') }}">
            <button>Prisijungti</button>
        </a>

        <a href="{{ route('register') }}">
            <button>Registruotis</button>
        </a>
        </div>
    @endif
    <a href="{{ route('knygos') }}">
        <button>Knygų sąrašas</button>
    </a>
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

@extends('layouts.master')

    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bibliotekos sistema</title>
</head>
<body>



@section('content')
    <h1>Sveiki atvykę į bibliotekos sistemą!</h1>


    @if($filter)

        <h2>Nepaimtų knygų sąrašas</h2>
        <a href="{{ route('knygos', ['filter' => false]) }}">
            <button>Rodyti visas knygas</button>
        </a>
    @else

        <h2>Knygų sąrašas</h2>
        <a href="{{ route('knygos', ['filter' => true]) }}">
            <button>Rodyti tik nepaimtas knygas</button>
        </a>
    @endif

    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Pavadinimas</th>
            <th>Autorius</th>
            <th>Leidimo metai</th>
            <th>Viso egzempliorių</th>
            <th>Laisvų egzempliorių</th>
            <!-- Add more columns if needed -->
        </tr>
        </thead>
        <tbody>
        @foreach($knygos as $knyga)
            <tr>
                <td>{{ $knyga->id }}</td>
                <td>{{ $knyga->pavadinimas }}</td>
                <td>{{ $knyga->autorius }}</td>
                <td>{{ $knyga->leidimo_metai }}</td>
                <td>{{ $knyga->egzemplioriu_skaicius }}</td>
                <td>{{ $knyga->laisvi_egzemplioriai }}</td>


                    @if (Auth::check())
                    <td>
                        <a href="{{ route('logout') }}">
                            <a href="{{ route('skolintis', ['book_id' => $knyga->id]) }}">Skolintis</a>
                        </a>
                    </td>
                    @endif

            </tr>
        @endforeach
        </tbody>
    </table>

    <footer>
        <p>© 2024 Gerda Tumelytė</p>
        <p>T120B145 Kompiuterių tinklai ir internetinės technologijos</p>
    </footer>
@endsection



</body>
</html>

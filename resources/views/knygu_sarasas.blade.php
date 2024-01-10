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
        <h2>
            Nepaimtos knygos
        </h2>
        <a href="{{ route('knygos') }}">
            <button>Rodyti visas knygas</button>
        </a>
    @else
        <h2>
            Knygų sąrašas
        </h2>
        <a href="{{ route('filtruotos_knygos') }}">
            <button>Rodyti tik nepaimtas knygas</button>
        </a>
    @endif

    <table class="table">
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

                            <a href="#" data-toggle="modal" data-target="#skolintis_confirmation{{$knyga->id}}">
                                Skolintis
                            </a>

                            @include('modals.skolintis_confirmation', ['knyga' => $knyga])

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

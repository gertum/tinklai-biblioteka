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


    @if(Auth::user()->role->pavadinimas === 'Bibliotekininkas' || Auth::user()->role->pavadinimas === 'Administratorius')
        {{--        aš turiu daug galios--}}
        <a href="{{ route('visi-skolinimaisi') }}">
            <button>Pridėti knygą</button>
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

            <td>{{ $knyga->id }}</td>
            <td>{{ $knyga->pavadinimas }}</td>
            <td>{{ $knyga->autorius }}</td>
            <td>{{ $knyga->leidimo_metai }}</td>
            <td>{{ $knyga->egzemplioriu_skaicius }}</td>
            <td>{{ $knyga->laisvi_egzemplioriai }}</td>

            <td>
                @if (Auth::check() && $knyga->laisvi_egzemplioriai > 0)

                    <a href="#" data-toggle="modal" data-target="#skolintis_confirmation{{$knyga->id}}">
                        <button>Skolintis</button>
                    </a>

                    @include('modals.skolintis_confirmation', ['knyga' => $knyga])

                @endif
                @if(Auth::user()->role->pavadinimas === 'Bibliotekininkas' || Auth::user()->role->pavadinimas === 'Administratorius')
                    {{--        aš turiu daug galios--}}

                    <a href="{{ route('visi-skolinimaisi') }}">
                        <button>Redaguoti knygą</button>
                    </a>

                    <a href="#" data-toggle="modal" data-target="#trinti_knyga_confirmation{{$knyga->id}}">
                        <button>Šalinti knygą</button>
                    </a>
                    @include('modals.trinti_knyga_confirmation', ['knyga' => $knyga])
                @endif
            </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection


</body>
</html>

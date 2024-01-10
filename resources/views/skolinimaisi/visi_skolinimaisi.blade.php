@extends('layouts.master')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bibliotekos sistema | Skolinimaisi</title>
</head>
<body>

@section('content')

    <h2>
        Pasiskolintos knygos
    </h2>

    <table class="table">
        <thead>
        <tr>
            <th>Pasiskolinęs vartotojas</th>
            <th>Knygos Pavadinimas</th>
            <th>Knygos Autorius</th>
            <th>Skolinimosi pradžia</th>
            <th>Skolinimosi pabaiga</th>
            <th>Grąžinimo data</th>
        </tr>
        </thead>
        <tbody>
        @foreach($skolinimaisi as $skolinimasis)
            <tr>
                <td>{{ $skolinimasis->vartotojas->vardas }}</td>
                <td>{{ $skolinimasis->knyga->pavadinimas }}</td>
                <td>{{ $skolinimasis->knyga->autorius }}</td>
                <td>{{ $skolinimasis->pradzios_data }}</td>
                <td>{{ $skolinimasis->pabaigos_data }}</td>
                <td>{{ $skolinimasis->grazinimo_data }}</td>
                <td>
                    @if(!$skolinimasis->grazinimo_data)
                        <form action="{{ route('zymeti_grazinima', ['skolinimasis' => $skolinimasis->id]) }}" method="POST">
                            @csrf <!-- Add CSRF token for security -->
                            @method('PUT') <!-- Use PUT method for updating -->

                            <button type="submit">Žymėti grąžinimą</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>

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
            <th>Knygos Pavadinimas</th>
            <th>Knygos Autorius</th>
            <th>Skolinimosi pradžia</th>
            <th>Skolinimosi pabaiga</th>
            <th>Grąžinimo data</th>
            <!-- Add more columns if needed -->
        </tr>
        </thead>
        <tbody>
        @foreach($skolinimaisi as $skolinimasis)
            <tr>
                <td>{{ $skolinimasis->knyga->pavadinimas }}</td>
                <td>{{ $skolinimasis->knyga->autorius }}</td>
                <td>{{ $skolinimasis->pradzios_data }}</td>
                <td>{{ $skolinimasis->pabaigos_data }}</td>
                <td>{{ $skolinimasis->grazinimo_data }}</td>
                <!-- Display other skolinimai details -->
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>

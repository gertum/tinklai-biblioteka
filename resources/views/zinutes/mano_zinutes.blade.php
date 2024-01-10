@extends('layouts.master')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bibliotekos sistema | žinutės</title>
</head>
<body>

@section('content')

    <h2>
        Gautos žinutės
    </h2>

    <table class="table">
        <thead>
        <tr>
{{--            <th>ID</th>--}}

            <th>Siuntėjas</th>
            <th>Tekstas</th>
            <!-- Add more columns if needed -->
        </tr>
        </thead>
        <tbody>
        @foreach($zinutes as $zinute)
            <tr>
{{--                <td>{{ $zinute->id }}</td>--}}
                <td>{{ optional($zinute->siucia)->username }}</td>
                <td>{{ $zinute->tekstas }}</td>
                <!-- Display other message details -->
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

</body>
</html>

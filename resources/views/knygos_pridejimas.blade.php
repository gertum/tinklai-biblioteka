<!-- resources/views/knygos_pridejimas.blade.php -->
{{--TODO later --}}
@extends('layouts.master')

@section('title', 'Pridėti knygą')

@section('content')

    <h1>Pridėti naują knygą</h1>

    <form method="POST" action="{{ route('store_book') }}">
        @csrf

        <div>
            <label for="pavadinimas">Pavadinimas:</label>
            <input type="text" id="pavadinimas" name="pavadinimas" required>
        </div>

        <div>
            <label for="autorius">Autorius:</label>
            <input type="text" id="autorius" name="autorius" required>
        </div>

        <div>
            <label for="leidimo_metai">Leidimo metai:</label>
            <input type="number" id="leidimo_metai" name="leidimo_metai" required>
        </div>

        <div>
            <label for="egzemplioriu_skaicius">Egzempliorių skaičius:</label>
            <input type="number" id="egzemplioriu_skaicius" name="egzemplioriu_skaicius" required>
        </div>

        <button type="submit">Pridėti knygą</button>
    </form>

@endsection

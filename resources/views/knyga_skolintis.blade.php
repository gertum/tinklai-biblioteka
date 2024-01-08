<!-- resources/views/knyga_skolintis.blade.php -->

@extends('layouts.master')

@section('title', 'Skolintis knygą')

@section('content')

    <h1>Skolinti knygą</h1>

    <!-- Display book details received from the controller -->
    <div id="bookDetails">
        <p>Book ID: {{ $book->id }}</p>
        <p>Pavadinimas: {{ $book->pavadinimas }}</p>
        <p>Autorius: {{ $book->autorius }}</p>
        <p>Leidimo metai: {{ $book->leidimo_metai }}</p>
        <!-- Add more book details as needed -->
    </div>

    <form method="POST" action="{{ route('borrow_book') }}">
        @csrf

        <!-- Hidden input to hold the book's ID -->
        <input type="hidden" name="book_id" value="{{ $book->id }}">

        <!-- Hidden input to hold the user's ID -->
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

        <div>
            <label for="pradzios_data">Pradžios data:</label>
            <input type="datetime-local" id="pradzios_data" name="pradzios_data" required>
        </div>

        <div>
            <label for="pabaigos_data">Pabaigos data:</label>
            <input type="datetime-local" id="pabaigos_data" name="pabaigos_data" required>
        </div>

        <button type="submit">Skolinti knygą</button>
    </form>

@endsection

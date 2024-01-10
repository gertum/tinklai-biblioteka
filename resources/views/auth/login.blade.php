<!-- resources/views/auth/login.blade.php -->

@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisijungimas</title>
    <!-- Include any CSS stylesheets here -->
    <!-- Example: <link rel="stylesheet" href="path/to/styles.css"> -->
</head>
<body>
<div class="container">

{{--knopke--}}
    <button onclick="goBack()">Grįžti</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>




    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Prisijungimas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="vardas" class="col-md-4 col-form-label text-md-right">{{ __('Vartotojo vardas') }}</label>

                            <div class="col-md-6">
                                <input id="vardas" type="text" class="form-control @error('vardas') is-invalid @enderror" name="vardas" value="{{ old('vardas') }}" required autocomplete="username" autofocus>

                                @error('vardas')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slaptazodis" class="col-md-4 col-form-label text-md-right">{{ __('Slaptažodis') }}</label>

                            <div class="col-md-6">
                                <input id="slaptazodis" type="password" class="form-control @error('slaptazodis') is-invalid @enderror" name="slaptazodis" required autocomplete="current-password">

                                @error('slaptazodis')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Prisijungti') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include any necessary scripts here -->
<!-- Example: <script src="path/to/script.js"></script> -->
</body>
</html>

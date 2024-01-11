<!-- resources/views/auth/register.blade.php -->

@extends('layouts.mistress')
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <!-- Include any CSS stylesheets here -->
    <!-- Example: <link rel="stylesheet" href="path/to/styles.css"> -->
</head>
<body>
<div class="container">

    {{-- Button for going back --}}
    <button onclick="goBack()">Grįžti</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registracija') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="vardas" class="col-md-4 col-form-label text-md-right">{{ __('Vardas') }}</label>

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
                                <input id="slaptazodis" type="password" class="form-control @error('slaptazodis') is-invalid @enderror" name="slaptazodis" required autocomplete="new-password">

                                @error('slaptazodis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slaptazodis_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Patvirtinti slaptažodį') }}</label>

                            <div class="col-md-6">
                                <input id="slaptazodis_confirmation" type="password" class="form-control" name="slaptazodis_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Hidden input for user role -->
                        <input type="hidden" name="role" value="Lankytojas">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registruotis') }}
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

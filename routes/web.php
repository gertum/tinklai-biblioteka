<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KnygosController;
use App\Http\Controllers\SkolinimaisiController;
use App\Http\Controllers\Auth\LoginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
////    return view('welcome');
//    return view('knygu_sarasas');
//
//});
//Route::get('/', [KnygosController::class, 'sarasas']);

// Authentication Routes...
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('register', [LoginController::class, 'register']);

//Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//Route::get('skolintis', [KnygosController::class, 'showSkolintisForm'])->name('skolintis');
Route::post('skolintis', [SkolinimaisiController::class, 'skolintis'])->name('skolintis');

//////homepage
////Route::get('/{filter?}', [KnygosController::class, 'sarasas'])->name('knygos');
//
//
//// Homepage route
//Route::get('/', [KnygosController::class, 'sarasas'])->name('knygos');
////
////// Homepage route with the $filter wildcard
////Route::get('/{filter}', [KnygosController::class, 'sarasas'])
////    ->where('filter', 'filter') // Matches the 'filter' text specifically
////    ->name('knygos');

//Route::get('/filtered', [KnygosController::class, 'filteredSarasas'])->name('knygos.filtered');
//Route::get('/', [KnygosController::class, 'sarasas'])->name('knygos.unfiltered');

// Route for displaying the book list (unfiltered)
Route::get('/', [KnygosController::class, 'sarasas'])->name('knygos');

// Route for displaying the filtered book list
Route::get('/filtruotos-knygos', [KnygosController::class, 'filteredSarasas'])->name('filtruotos_knygos');

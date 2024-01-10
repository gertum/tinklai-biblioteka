<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KnygosController;
use App\Http\Controllers\SkolinimaisiController;
use App\Http\Controllers\ZinutesController;
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
// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [LoginController::class, 'showRegisterForm'])->name('register');
Route::post('register', [LoginController::class, 'register']);

// skolinimaisi
Route::post('/skolintis/{knygosId}', [SkolinimaisiController::class, 'skolintis'])->name('skolintis');
Route::get('/mano-skolinimaisi', [SkolinimaisiController::class, 'manoSkolinimaisi'])->name('skolinimaisi');
//zinutes
Route::get('/zinutes', [ZinutesController::class, 'index'])->name('zinutes');


// Route for displaying the book list (unfiltered) / HOMEPAGE
Route::get('/', [KnygosController::class, 'sarasas'])->name('knygos');

// Route for displaying the filtered book list
Route::get('/filtruotos-knygos', [KnygosController::class, 'filteredSarasas'])->name('filtruotos_knygos');

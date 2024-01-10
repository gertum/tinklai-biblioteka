<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KnygosController;
use App\Http\Controllers\SkolinimaisiController;
use App\Http\Controllers\ZinutesController;
use App\Http\Controllers\Auth\AuthController;
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
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// skolinimaisi
Route::post('/skolintis/{knygosId}', [SkolinimaisiController::class, 'skolintis'])->name('skolintis');
Route::get('/mano-skolinimaisi', [SkolinimaisiController::class, 'manoSkolinimaisi'])->name('skolinimaisi');
Route::get('/visi-skolinimaisi', [SkolinimaisiController::class, 'visiSkolinimaisi'])->name('visi-skolinimaisi');
Route::put('/zymeti-grazinima/{skolinimasis}', [SkolinimaisiController::class, 'zymetiGrazinima'])->name('zymeti_grazinima');

//zinutes
Route::get('/zinutes', [ZinutesController::class, 'index'])->name('zinutes');


// Route for displaying the book list (unfiltered) / HOMEPAGE
Route::get('/', [KnygosController::class, 'sarasas'])->name('knygos');

// Route for displaying the filtered book list
Route::get('/filtruotos-knygos', [KnygosController::class, 'filteredSarasas'])->name('filtruotos_knygos');

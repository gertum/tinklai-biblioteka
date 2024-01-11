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
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::middleware(['role:Administratorius'])->group(function () {
Route::get('register-librarian', [AuthController::class, 'showLibrarianRegisterForm'])->name('register-librarian');
Route::post('register-librarian', [AuthController::class, 'registerLibrarian']);
});

// skolinimaisi
Route::post('/skolintis/{knygosId}', [SkolinimaisiController::class, 'skolintis'])->name('skolintis');
Route::get('/mano-skolinimaisi', [SkolinimaisiController::class, 'manoSkolinimaisi'])->name('skolinimaisi');

Route::middleware(['role:Bibliotekininkas,Administratorius'])->group(function () {
Route::get('/visi-skolinimaisi', [SkolinimaisiController::class, 'visiSkolinimaisi'])->name('visi-skolinimaisi');
Route::put('/zymeti-grazinima/{skolinimasis}', [SkolinimaisiController::class, 'zymetiGrazinima'])->name('zymeti_grazinima');
});

//knygos valdymas
Route::middleware(['role:Bibliotekininkas,Administratorius'])->group(function () {
Route::delete('/trinti-knyga/{id}', [KnygosController::class, 'trinti'])->name('trinti-knyga');
Route::post('/store-book', [KnygosController::class, 'store'])->name('store-book');
Route::put('/update-book/{id}', [KnygosController::class, 'update'])->name('update-book');
});

//zinutes
Route::get('/zinutes', [ZinutesController::class, 'index'])->name('zinutes');
Route::post('/zinutes/create', [ZinutesController::class, 'create'])->name('zinutes.create');


// Route for displaying the book list (unfiltered) / HOMEPAGE
Route::get('/', [KnygosController::class, 'sarasas'])->name('knygos');

// Route for displaying the filtered book list
Route::get('/filtruotos-knygos', [KnygosController::class, 'filteredSarasas'])->name('filtruotos_knygos');

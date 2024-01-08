<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KnygosController;
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


Route::get('/skolintis', [KnygosController::class, 'skolintis'])->name('skolintis');
//homepage
Route::get('/{filter?}', [KnygosController::class, 'sarasas'])->name('knygos');


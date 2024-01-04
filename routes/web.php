<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KnygosController;

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
Route::get('/{filter?}', [KnygosController::class, 'sarasas'])->name('knygos');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\anggotaController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\dashboardController;

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

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/', [dashboardController::class, 'index'])->name('home');

Route::resource('buku', BukuController::class);
Route::resource('kategori', kategoriController::class);
Route::resource('anggota', anggotaController::class);



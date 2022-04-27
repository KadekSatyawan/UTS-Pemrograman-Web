<?php

use App\Http\Controllers\JenisController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\PanenController;
use App\Http\Controllers\PendataanPetaniController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::resource('/jenis', JenisController::class);
Route::resource('/harga', HargaController::class);

Route::resource('/panen', PanenController::class);
Route::resource('/daftarpanen', PanenController::class);
Route::resource('/pendataan', PendataanPetaniController::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return redirect('/barang');
});

Route::resource('barang', BarangController::class);

Route::resource('pemesanan', PemesananController::class);
Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy'])->name('pemesanan.destroy');


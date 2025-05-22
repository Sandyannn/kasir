<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use \App\Http\Controllers\EventController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\NotaController;

Route::get('/', function () {
    return redirect('/transaksi');
});
Route::resource('barang', BarangController::class);
Route::resource('event', EventController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('transaksi',TransaksiController::class);
Route::get('/nota/{id}', [NotaController::class, 'show'])->name('nota.show');
Route::get('/nota/{id}/cetak', [TransaksiController::class, 'cetakNota'])->name('nota.cetak');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TransaksiController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'Selamat datang di 12 RPL B';
});

//menampilkan hal biodata dari biodata.blade.php
Route::get('/biodata', function () {
    return view('biodata',[
        'nama' => 'Rizki Aditya',
        'alamat' => 'Batujajar',
        'hobi' => 'Badminton'
    ]);
});

Route::get('/penjumlahan', function () {
    return 4*4;
});

// menampilkan tampilan login
Route::get('/login', [LoginController::class, 'index']);
// cek login
Route::post('/login', [LoginController::class, 'cek_login']);

//untuk logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// memanggil halaman admin - home
Route::get('/admin/home', [AdminController::class, 'index']);

// memanggil halaman admin - kategori
Route::get('/admin/kategori', [KategoriController::class, 'index']);
//menyimpan data kategori
Route::post('/tambah_kategori', [KategoriController::class, 'store']);
//mengubah data kategori
Route::put('/ubah_kategori/{id}', [KategoriController::class, 'update'])->name('ubah_kategori');
//menghapus data kategori
Route::delete('/hapus_kategori/{id}', [KategoriController::class, 'destroy'])->name('hapus_kategori');

//memanggil halaman admin - produk
Route::get('/admin/produk', [ProdukController::class, 'index']);
//menyimpan data produk
Route::post('/tambah_produk', [ProdukController::class, 'store']);
//mengubah data produk
Route::put('/ubah_produk/{id}', [ProdukController::class, 'update'])->name('ubah_produk');
//menghapus data kategori
Route::delete('/hapus_produk/{id}', [ProdukController::class, 'destroy'])->name('hapus_produk');

//memanggil halaman admin - transaksi
Route::get('/admin/transaksi', [TransaksiController::class, 'index']);
//Menambahkan produk ke keranjang
Route::post('/add_to_cart/{id}', [TransaksiController::class, 'add_cart'])->name('add_cart');
//Hapus salah satu item di keranjang
Route::delete('/keranjang/{id}', [TransaksiController::class, 'destroy'])->name('keranjang.destroy');

Route::post('/keranjang/update/{id}', [TransaksiController::class, 'updateQty'])->name('keranjang.update');

Route::post('/transaksi/simpan', [TransaksiController::class, 'simpanTransaksi'])->name('simpan_transaksi');

Route::get('/transaksi/cetak/{kode}', [TransaksiController::class, 'cetak'])->name('transaksi.cetak');

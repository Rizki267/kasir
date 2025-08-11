<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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


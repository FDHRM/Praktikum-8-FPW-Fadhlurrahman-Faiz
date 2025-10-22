<?php

use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PengelolaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [UserController::class, 'showLogin'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');

Route::get('/register', [UserController::class, 'showRegister'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.post'); 


Route::middleware('auth')->group(function (){

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/home', function () {
    return view('pages.home');
});

Route::get('/tentang', function () {
    return view('pages.tentang');
});

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/tambah-buku', [BukuController::class, 'create']);
Route::post('/simpan-buku', [BukuController::class, 'store']);

Route::get('/edit-buku/{id}', [BukuController::class, 'edit']);
Route::put('/update-buku/{id}', [BukuController::class, 'update']);
Route::delete('/hapus-buku/{id}', [BukuController::class, 'destroy']);

Route::get('/pengelola', [PengelolaController::class, 'index']);
Route::get('/tambah-pengelola', [PengelolaController::class, 'create']);
Route::post('/simpan-pengelola', [PengelolaController::class, 'store']);

Route::get('/edit-pengelola/{id}', [PengelolaController::class, 'edit']);
Route::put('/update-pengelola/{id}', [PengelolaController::class, 'update']);
Route::delete('/hapus-pengelola/{id}', [PengelolaController::class, 'destroy']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

});
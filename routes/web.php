<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PcController;
use App\Http\Controllers\PosterController;

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

Route::get('/logout',[AuthenticationController::class, 'logout']);

Route::middleware(['logged.in'])->group(function () {
    Route::get('/',[AuthenticationController::class, 'login']);
    Route::post('/login-process',[AuthenticationController::class, 'login_process']);
});

Route::prefix('album')->middleware(['is.logged'])->group(function () {
    Route::get('/',[AlbumController::class, 'index']);
    Route::get('/tambah',[AlbumController::class, 'tambah']);
    Route::post('/tambah',[AlbumController::class, 'store']);
    Route::get('/hapus/{id}',[AlbumController::class, 'destroy']);
    Route::get('/ubah/{id}',[AlbumController::class, 'ubah']);
    Route::post('/ubah/{id}',[AlbumController::class, 'update']);
    Route::get('/detail/{id}',[AlbumController::class, 'detail']);
});
Route::prefix('pc')->middleware(['is.logged'])->group(function () {
    Route::get('/tambah/{id}',[PcController::class, 'tambah']);
    Route::post('/tambah/{id}',[PcController::class, 'store']);
    Route::get('/hapus/{id}',[PcController::class, 'destroy']);
    Route::get('/ubah/{id}',[PcController::class, 'ubah']);
    Route::post('/ubah/{id}',[PcController::class, 'update']);
});
Route::prefix('poster')->middleware(['is.logged'])->group(function () {
    Route::get('/tambah/{id}',[PosterController::class, 'tambah']);
    Route::post('/tambah/{id}',[PosterController::class, 'store']);
    Route::get('/hapus/{id}',[PosterController::class, 'destroy']);
    Route::get('/ubah/{id}',[PosterController::class, 'ubah']);
    Route::post('/ubah/{id}',[PosterController::class, 'update']);
});
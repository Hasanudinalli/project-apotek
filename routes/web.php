<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test-admin', function () {
    return view('layouts.admin');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']],
      function(){
          Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
          Route::get('/', function () {
    return view('admin.index');
});

      });

      Route::group(['prefix' => 'user', 'middleware' => ['auth']],
      function(){
          Route::get('/home', [App\Http\Controllers\HomeController::class, 'index2'])->name('home2');
      });

Route::resource('author', AuthorController::class);
Route::resource('book', BookController::class);
Route::resource('informasi', InformasiController::class);
Route::resource('obat', ObatController::class);
Route::resource('laporan', LaporanController::class);
Route::resource('transaksi', TransaksiController::class);



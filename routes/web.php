<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ControllerMahasiswa;
use \App\Http\Controllers\Controlleruniversitas;

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
})->name('welcome');

Route::resource('/mahasiswa', ControllerMahasiswa::class);
Route::resource('/universitas', Controlleruniversitas::class);
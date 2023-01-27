<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\API\HomeController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'proses'])->name('proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/home', [HomeController::class, 'index'])->name('admin');
    Route::get('/{any}', [HomeController::class, 'index'])->where('any', '.*');
});

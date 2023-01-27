<?php

use App\Http\Controllers\API\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MenaraController;
use App\Http\Controllers\API\TagihanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



route::apiResources(['menara' => MenaraController::class,]);
route::apiResources(['tagihan' => TagihanController::class,]);
route::get('menaraall', [MenaraController::class, 'menaraall'])->name('menaraall');
route::post('/sendEmail/{email}', [TagihanController::class, 'sendEmail'])->name('sendEmail');
route::post('/bayar/{id}', [TagihanController::class, 'bayar'])->name('bayar');
route::get('/tagihanlunas', [TagihanController::class, 'tagihanLunas'])->name('tagihanLunas');
route::post('/printPdf/{id}', [TagihanController::class, 'printPdf'])->name('printPdf');
route::get('/countUsers', [HomeController::class, 'countUsers'])->name('countUsers');
route::get('/countMenara', [HomeController::class, 'countMenara'])->name('countMenara');
route::get('/countSudah', [HomeController::class, 'countSudah'])->name('countSudah');
route::get('/countBelum', [HomeController::class, 'countBelum'])->name('countBelum');

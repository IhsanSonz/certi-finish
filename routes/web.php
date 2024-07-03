<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'certificate', 'as' => 'certificate.'], function () {
    Route::get('/', [Controllers\CertificateController::class, 'index'])->name('index');
    Route::get('/create', [Controllers\CertificateController::class, 'create'])->name('create');
    Route::post('/store', [Controllers\CertificateController::class, 'store'])->name('store');
    Route::post('/destroy/{id}', [Controllers\CertificateController::class, 'destroy'])->name('destroy');
});

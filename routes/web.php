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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/login', [Controllers\AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [Controllers\AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [Controllers\AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\UserController::class, 'index'])->name('index');
    Route::get('/create', [Controllers\UserController::class, 'create'])->name('create');
    Route::post('/store', [Controllers\UserController::class, 'store'])->name('store');
    Route::post('/destroy/{id}', [Controllers\UserController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'certificate', 'as' => 'certificate.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\CertificateController::class, 'index'])->name('index');
    Route::get('/create', [Controllers\CertificateController::class, 'create'])->name('create');
    Route::post('/store', [Controllers\CertificateController::class, 'store'])->name('store');
    Route::post('/destroy/{id}', [Controllers\CertificateController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [Controllers\CertificateController::class, 'edit'])->name('edit'); // Mengubah URL menjadi '/{id}/edit'
    Route::put('/certificate/{id}', [Controllers\CertificateController::class, 'update'])->name('update');

});

Route::group(['prefix' => 'participant', 'as' => 'participant.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\ParticipantController::class, 'index'])->name('index');
    Route::get('/create', [Controllers\ParticipantController::class, 'create'])->name('create');
    Route::post('/store', [Controllers\ParticipantController::class, 'store'])->name('store');
    Route::delete('/destroy/{id}', [Controllers\ParticipantController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [Controllers\ParticipantController::class, 'edit'])->name('edit');
    Route::put('/{id}', [Controllers\ParticipantController::class, 'update'])->name('update');
});


Route::group(['prefix' => 'assesment', 'as' => 'assesment.', 'middleware' => 'auth'], function () {
    Route::get('/', [Controllers\AssesmentController::class, 'index'])->name('index');
    Route::get('/show/{id}', [Controllers\AssesmentController::class, 'show'])->name('show');
    Route::get('/create', [Controllers\AssesmentController::class, 'create'])->name('create');
    Route::post('/store', [Controllers\AssesmentController::class, 'store'])->name('store');
    Route::post('/destroy/{id}', [Controllers\AssesmentController::class, 'destroy'])->name('destroy');
    Route::get('/{id}/edit', [App\Http\Controllers\AssesmentController::class, 'edit'])->name('edit');
    Route::put('/{id}', [App\Http\Controllers\AssesmentController::class, 'update'])->name('update');
    Route::get('/export-excel', [Controllers\AssesmentController::class, 'exportExcel'])->name('export-excel');
});

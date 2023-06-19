<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FuneralController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::group(['middleware' => 'auth'], function () {
Route::controller(FuneralController::class)->group(function () {
    Route::get('/dash/funerals', 'index')->name('dashboard.index');
    Route::get('/dash/new', 'new')->name('dashboard.new');
    Route::get('/dash/funerals/{id}/edit', 'edit')->name('edit.funeral');
    Route::put('/dash/funerals/{id}', 'update')->name('update.funeral');
    Route::get('dash/new/{id}/edit', 'editNew')->name('edit.new');
});


Route::get('/dash/workers', [UserController::class, 'index'])->name('dashboard.users');

Route::get('/dash/offers', [OfferController::class, 'index'])->name('dashboard.offers');
});
Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});

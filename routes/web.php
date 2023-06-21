<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
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
    Route::patch('/dash/funerals/{id}', 'update')->name('update.funeral');
    Route::get('dash/new/{id}/edit', 'editNew')->name('edit.new');
    Route::patch('dash/new/{id}', 'updateNew')->name('update.new');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/dash/workers', 'index')->name('dashboard.workers');
    Route::get('/dash/workers/{id}/edit', 'edit')->name('edit.worker');
    Route::patch('/dash/workers/{id}', 'update')->name('update.worker');

});
Route::controller(OfferController::class)->group(function () {
    Route::get('/dash/offers', 'index')->name('dashboard.offers');
    Route::get('/dash/offers/{id}/edit.', 'edit')->name('edit.offer');
    Route::put('/dash/offers/{id}', 'update')->name('update.offer');

});
Route::controller(ClientController::class)->group(function () {
    Route::get('/dash/clients', 'index')->name('dashboard.clients');
    Route::get('/dash/clients/{id}/show', 'show')->name('show.client');
    Route::get('/dash/clients/{id}/edit', 'edit')->name('edit.client');
    Route::put('/dash/clients/{id}', 'update')->name('update.client');
});

});
Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});

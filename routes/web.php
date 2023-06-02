<?php

use App\Http\Controllers\FuneralController;
use App\Http\Controllers\FuneralsController;
use App\Models\Funerals;
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
Route::get('/login', function () {
    return view('login');
});

Route::controller(FuneralController::class)->group(function () {
    Route::get('/dash', 'index')->name('dashboard.index');
    Route::get('/dash/new', 'new')->name('dashboard.new');
    Route::get('/dash/show/{id}', 'show')->name('dashboard.show');
});

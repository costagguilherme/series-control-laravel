<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticator;
use App\Mail\SeriesCreated;


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
    return redirect()->route('series.index');
});

Route::get('/email', function () {
    return new SeriesCreated('Série', 1, 4, 5);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/users', [UsersController::class, 'create'])->name('user.create');
Route::post('/users', [UsersController::class, 'store'])->name('user.store');


Route::get('/series', [SeriesController::class, 'index'])->name('series.index');

Route::middleware(Authenticator::class)->group(function() {

    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');


    Route::controller(SeriesController::class)->group(function () {
        Route::get('/series/create', 'create')->name('series.create');
        Route::post('/series/store', 'store')->name('series.store');
        Route::delete('/series/destroy/{id}', 'destroy')->name('series.destroy');
        Route::get('/series/edit/{id}', 'edit')->name('series.edit');
        Route::put('/series/update/{id}', 'update')->name('series.update');
    });


    Route::get('/series/{id}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');
    Route::get('/seasons/{id}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::put('/seasons/{id}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');

});


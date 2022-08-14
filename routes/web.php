<?php

use App\Http\Middleware\CustomAuthenticate;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use Illuminate\Support\Facades\Route;

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

/** WITHOUT OR INCONTROLLER AUTH */

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'signin'])->name('login.signin');

// Register
Route::get('/register', [UsersController::class, 'create'])->name('users.create');
Route::post('/register', [UsersController::class, 'store'])->name('users.store');

// Series
Route::resource('/series', SeriesController::class)->except(['show']);

// Seasons
Route::get('/series/{series}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');

// Episodes
Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');

/** WITH AUTH */
Route::middleware('custom.auth')->group(function() {
    Route::get('/', function () {
        return redirect('/series');
    });

    // Login
    Route::get('/logout', [LoginController::class, 'signout'])->name('logout');

    // Episodes
    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
});
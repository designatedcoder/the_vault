<?php

use Inertia\Inertia;
use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

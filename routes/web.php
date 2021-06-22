<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AdminController;



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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';







Route::get('add-car', [AdminController::class, 'index']);
Route::post('submit', [AdminController::class, 'create']);
Route::post('rate-store', [CarController::class, 'store']);
Route::get('car-list', [CarController::class, 'index']);
Route::get('car-detail/{id}', [CarController::class, 'car_detail']);

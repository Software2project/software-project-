<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\UserController;

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
    return view('index');
})->middleware('auth');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    # Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

   # Papers
   Route::resource('/papers', PaperController::class);
   Route::post('papers/{id}', [PaperController::class, 'update']);
   Route::get('/papersFilter', [PaperController::class, 'filter'])->name('papers.filter');
   Route::get('papers/delete/{id}', [PaperController::class, 'destroy']);
   Route::get('papers/detail/{id}', [PaperController::class, 'detail']);

   # Users
   Route::resource('/users', UserController::class);
   Route::post('users/{id}', [UserController::class, 'update']);
   Route::get('users/delete/{id}', [UserController::class, 'destroy']);
   Route::get('users/detail/{id}', [UserController::class, 'detail']);


});

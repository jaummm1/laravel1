<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/signin', [AuthController::class, 'signin'])->name('signin');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/clients/store', [AuthController::class, 'criar']);
Route::get('/clients/show/{client}', [AuthController::class, 'show']);
Route::get('/clients/name/{name}', [AuthController::class, 'name']);
Route::get('/clients/search/{text}', [AuthController::class, 'text']);
Route::get('/clients/bills/{client}', [AuthController::class, 'bills']);
Route::get('/bills/expensive/{value}', [AuthController::class, 'caro']);
Route::get('/bills/between/{value1}/{value2}', [AuthController::class, 'values']);
Route::get('/clients/order', [AuthController::class, 'order']);



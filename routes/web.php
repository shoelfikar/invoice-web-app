<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
Route::get('/company', [CompanyController::class, 'index'])->name('setting.company');
Route::get('/login',[AuthController::class, 'index'])->name('user.index');
Route::post('/login',[AuthController::class, 'login'])->name('user.login');
Route::get('/logout',[AuthController::class, 'logout'])->name('user.logout');

//user
Route::get('/user',[UserController::class, 'index'])->name('user.index');

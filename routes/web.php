<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;

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


// GETs

Route::get('/register',[userController::class, 'showRegister']);
Route::get('/login',[userController::class, 'showLogin']);
Route::get('/loggedin',[userController::class, 'showLoggedin']);
Route::get('/logout',[userController::class, 'logout']);




// POSTs

Route::post('/register' , [userController::class, 'register'])->name('register');
Route::post('/login' , [userController::class, 'login'])->name('login');


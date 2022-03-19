<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\bdcontroller;

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
Route::view('home','wlc');

Route::get('/we' , function () {
    return view('WE');
});
Route::view('dbb','db');
Route::post('dbb',[bdcontroller::class,'add']);


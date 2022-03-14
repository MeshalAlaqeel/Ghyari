<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

=======
use App\Http\Controllers\bdcontroller;
>>>>>>> 33f3afee439283cc167e3ce29672409963034fe3
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
<<<<<<< HEAD


Route::get('/we' , function () {
    return view('WE');
});
=======
Route::view('dbb','db');
Route::post('dbb',[bdcontroller::class,'add']);
>>>>>>> 33f3afee439283cc167e3ce29672409963034fe3

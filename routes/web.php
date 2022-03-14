<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
use App\Http\Controllers\bdcontroller;
>>>>>>> 33f3afee439283cc167e3ce29672409963034fe3
>>>>>>> fcf6bf3dac1b8f3623f71b55961fd7f4f4640f5b
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
=======
<<<<<<< HEAD


Route::get('/we' , function () {
    return view('WE');
});
=======
Route::view('dbb','db');
Route::post('dbb',[bdcontroller::class,'add']);
>>>>>>> 33f3afee439283cc167e3ce29672409963034fe3
>>>>>>> fcf6bf3dac1b8f3623f71b55961fd7f4f4640f5b

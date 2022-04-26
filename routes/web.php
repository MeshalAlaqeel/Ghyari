<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\itemController;

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

// $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

//--------------------------------User-Controller-------------------------------------//

// GETs

Route::get('/register',[userController::class, 'showRegister'])->name('showRegister');
Route::get('/login',[userController::class, 'showLogin'])->name('showLogin');
Route::get('/loggedin',[userController::class, 'showLoggedin'])->name('showLoggedin');
Route::get('/adminIndex',[userController::class, 'showAdminIndex'])->name('showAdminIndex');
Route::get('/logout',[userController::class, 'logout'])->name('logout');
Route::get('/forgetPassword',[userController::class, 'showForgetPassword'])->name('showForgetPassword');
Route::get('/resetPassword/{token}',[userController::class, 'showResetPassword'])->name('showResetPassword');
Route::get('/editInformation',[userController::class, 'showEditInformation'])->name('showEditInformation');
Route::get('/editAdminInformation',[userController::class, 'showEditAdminInformation'])->name('showEditAdminInformation');
Route::get('/disableAccount',[userController::class, 'showDisableAccount'])->name('showDisableAccount');



// POSTs

Route::post('/register' , [userController::class, 'register'])->name('register');
Route::post('/login' , [userController::class, 'login'])->name('login');
Route::post('/forgetPassword',[userController::class, 'sendResetLink'])->name('sendResetLink');
Route::post('/resetPassword',[userController::class, 'resetPassword'])->name('resetPassword');
Route::post('/editInformation',[userController::class, 'editInformation'])->name('editInformation');
Route::post('/disableAccount',[userController::class, 'disableAccount'])->name('disableAccount');
Route::post('/enableAccount',[userController::class, 'enableAccount'])->name('enableAccount');
Route::post('/deleteAccount',[userController::class, 'deleteAccount'])->name('deleteAccount');

//-------------------------------End-User-Controller-------------------------------------//

//--------------------------------Item-Controller-------------------------------------//


// GETs

Route::get('/addItem',[itemController::class, 'showAddItem'])->name('showAddItem');
Route::get('/items',[itemController::class, 'showItems'])->name('showItems');
Route::get('/itemPage/{id}',[itemController::class, 'showItemPage'])->name('showItemPage');


// POSTs

Route::post('/addItem' , [itemController::class, 'addItem'])->name('addItem');
Route::post('/editItem' , [itemController::class, 'editItem'])->name('editItem');
Route::post('/deleteItem' , [itemController::class, 'deleteItem'])->name('deleteItem');



//-------------------------------End-Item-Controller-------------------------------------//
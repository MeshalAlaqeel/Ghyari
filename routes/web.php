<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\userController;
use App\Http\Controllers\itemController;
use App\Http\Controllers\cart_itemController;
use App\Http\Controllers\wish_itemController;
use App\Http\Controllers\remindMe_itemController;
use App\Http\Controllers\commentController;
use App\Http\Controllers\rateController;
use App\Http\Controllers\creditCardController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\orderController;
use App\Models\comment;

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

//--------------------------------User-Controller-------------------------------------//

// GETs

// Route::get('/',[userController::class, 'showRegister'])->name('Home');
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
Route::get('/notification',[userController::class, 'showNotification'])->name('showNotification');



// POSTs

Route::post('/register' , [userController::class, 'register'])->name('register');
Route::post('/login' , [userController::class, 'login'])->name('login');
Route::post('/forgetPassword',[userController::class, 'sendResetLink'])->name('sendResetLink');
Route::post('/resetPassword',[userController::class, 'resetPassword'])->name('resetPassword');
Route::post('/editInformation',[userController::class, 'editInformation'])->name('editInformation');
Route::post('/address',[userController::class, 'address'])->name('address');
Route::post('/disableAccount',[userController::class, 'disableAccount'])->name('disableAccount');
Route::post('/enableAccount',[userController::class, 'enableAccount'])->name('enableAccount');
Route::post('/deleteAccount',[userController::class, 'deleteAccount'])->name('deleteAccount');
Route::post('/searchUser' , [userController::class, 'searchUser'])->name('searchUser');//admin User
Route::post('/notification',[userController::class, 'notification'])->name('notification');


//-------------------------------End-User-Controller-------------------------------------//

//--------------------------------Item-Controller-------------------------------------//


// GETs

Route::get('/addItem',[itemController::class, 'showAddItem'])->name('showAddItem');
Route::get('/adminItems',[itemController::class, 'showAdminItems'])->name('showAdminItems');
Route::get('/adminItemPage/{id}',[itemController::class, 'showAdminItemPage'])->name('showAdminItemPage');
Route::get('/items',[itemController::class, 'showItems'])->name('showItems');
Route::get('/itemPage/{id}',[itemController::class, 'showItemPage'])->name('showItemPage');
// Route::get('/cart',[itemController::class, 'showCart'])->name('showCart');
// Route::get('/search',[itemController::class, 'showSearch'])->name('showSearch');


// POSTs

Route::post('/addItem' , [itemController::class, 'addItem'])->name('addItem');
Route::post('/editItem' , [itemController::class, 'editItem'])->name('editItem');
Route::post('/deleteItem' , [itemController::class, 'deleteItem'])->name('deleteItem');
Route::post('/search' , [itemController::class, 'search'])->name('search');//search User
Route::post('/searchItem' , [itemController::class, 'searchItem'])->name('searchItem');//admin User
Route::post('/returnItem' , [itemController::class, 'returnItem'])->name('returnItem');



//-------------------------------End-Item-Controller-------------------------------------//

//--------------------------------cart_item-Controller-------------------------------------//


// GETs

Route::get('/cart',[cart_itemController::class, 'showCart'])->name('showCart');


// POSTs

Route::post('/addToCart' , [cart_itemController::class, 'addToCart'])->name('addToCart');
Route::post('/deleteFromCart' , [cart_itemController::class, 'deleteFromCart'])->name('deleteFromCart');
Route::post('/editFromCart' , [cart_itemController::class, 'editFromCart'])->name('editFromCart');



//-------------------------------End-cart_item-Controller-------------------------------------//

//--------------------------------wish_item-Controller-------------------------------------//


// GETs

Route::get('/wish',[wish_itemController::class, 'showWish'])->name('showWish');


// POSTs

Route::post('/addToWish' , [wish_itemController::class, 'addToWish'])->name('addToWish');
Route::post('/deleteFromWish' , [wish_itemController::class, 'deleteFromWish'])->name('deleteFromWish');


//-------------------------------End-wish_item-Controller-------------------------------------//

//--------------------------------RemindMe_item-Controller-------------------------------------//


// GETs

Route::get('/RemindMe',[RemindMe_itemController::class, 'showRemindMe'])->name('showRemindMe');


// POSTs

Route::post('/addToRemindMe' , [RemindMe_itemController::class, 'addToRemindMe'])->name('addToRemindMe');
Route::post('/deleteFromRemindMe' , [RemindMe_itemController::class, 'deleteFromRemindMe'])->name('deleteFromRemindMe');


//-------------------------------End-RemindMe_item-Controller-------------------------------------//

//--------------------------------Comment-Controller-------------------------------------//


// GETs



// POSTs

Route::post('/addComment' , [commentController::class, 'addComment'])->name('addComment');
Route::post('/deleteComment' , [commentController::class, 'deleteComment'])->name('deleteComment');


//-------------------------------End-Comment-Controller-------------------------------------//

//--------------------------------Rate-Controller-------------------------------------//


// GETs



// POSTs

Route::post('/addRating' , [rateController::class, 'addRating'])->name('addRating');


//-------------------------------End-Rate-Controller-------------------------------------//

//--------------------------------credit-card-controller-------------------------------------//


// GETs

Route::get('/addCreditCard',[creditCardController::class, 'showAddCreditCard'])->name('showAddCreditCard');
Route::get('/CreditCards',[creditCardController::class, 'showCreditCards'])->name('showCreditCards');

// POSTs

Route::post('/addCreditCard' , [creditCardController::class, 'addCreditCard'])->name('addCreditCard');
Route::post('/deleteCreditCard' , [creditCardController::class, 'deleteCreditCard'])->name('deleteCreditCard');


//-------------------------------End-credit-card-controller------------------------------------//

//--------------------------------Check-out-controller-------------------------------------//


// GETs

Route::get('/checkout',[CheckoutController::class, 'showCheckout'])->name('showCheckout');
Route::get('/done',[CheckoutController::class, 'showDone'])->name('showDone');


// POSTs

Route::post('/checkout' , [CheckoutController::class, 'afterpayment'])->name('checkout.credit-card');
Route::post('/payMethod',[CheckoutController::class, 'payMethod'])->name('payMethod');
Route::post('/pay',[CheckoutController::class, 'pay'])->name('pay');

//-------------------------------End-Check-out-controller------------------------------------//

//--------------------------------Order-controller-------------------------------------//


// GETs

Route::get('/orders',[orderController::class, 'showOrders'])->name('showOrders');
Route::get('/adminOrders',[orderController::class, 'showAdminOrders'])->name('showAdminOrders');
Route::get('/orderPage/{id}',[orderController::class, 'showOrderPage'])->name('showOrderPage');


// POSTs

Route::post('/changeStatus' , [orderController::class, 'changeStatus'])->name('changeStatus');
Route::post('/searchOrder' , [orderController::class, 'searchOrder'])->name('searchOrder');


//-------------------------------End-Order-controller------------------------------------//

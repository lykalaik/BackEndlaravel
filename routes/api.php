<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrdersController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function (){
    Route::get('/user',         'index');
    Route::post('/login',         'login')->name('user.login');
    Route::post('/createuser',         'createuser');
    Route::put('/updateuser/{id}',         'updateuser')->name('user.update');
    Route::get('/getuser/{id}',         'showuser');
});

Route::controller(FoodController::class)->group(function (){
    Route::post('/createfood',         'createfood');
    Route::post('/createbeverage',         'createbeverage');
    Route::get('/viewfoods',         'viewfoods');
    Route::get('/viewbeverage',         'viewbeverage');
    Route::get('/getfood/{food_id}',         'getfood');
    Route::get('/getbeverage/{beverage_id}',         'getbeverage');
});

Route::controller(OrdersController::class)->group(function (){
    Route::post('/createorder',         'createorder');
    Route::get('/viewcart/{customername}',         'viewcart');
    Route::get('/vieworder/{customername}',         'vieworder');
    Route::put('/updateorder',         'updateorder');
    Route::put('/updatespecificorder/{order_id}',         'updatespecificorder');
    Route::delete('/deleteorder/{id}',         'deleteorder');
});

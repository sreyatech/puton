<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// admin
Route::get('/product',[AdminController::class,'product']);
Route::post('/uploadproduct',[AdminController::class,'uploadProduct']);
Route::get('/showproducts',[AdminController::class,'showProducts']);
Route::get('/deleteproduct/{id}',[AdminController::class,'deleteProduct']);
Route::get('/updateproduct/{id}',[AdminController::class,'updateProduct']);
Route::post('/updatesave/{id}',[AdminController::class,'updateSave']);
Route::get('/showorders',[AdminController::class,'showOrders']);
Route::get('/deleteorder/{id}',[AdminController::class,'deleteOrder']);
Route::get('/updatestatus/{id}',[AdminController::class,'updateStatus']);


// home
Route::get('/',[HomeController::class,'index']);
Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/search',[HomeController::class,'search']);
Route::post('/addcart/{id}',[HomeController::class,'addCart']);
Route::get('/showcart',[HomeController::class,'showCart']);
Route::get('/removeproduct/{id}',[HomeController::class,'removeProduct']);
Route::post('/confirmorder',[HomeController::class,'confirmOrder']);


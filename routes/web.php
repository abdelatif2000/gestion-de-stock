<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::group([ "middleware"=>["auth"]  ],function(){
    // routes of  users  :
    Route::resource('user',AdminController::class)->middleware('admin');
    //routes of Home :
    Route::get('/',[HomeController::class ,'index'])->name("home");
    Route::get('filterByDate',[HomeController::class ,'filterByDate'])->name("home.filterByDate");
    //routes of products:
    Route::resource('product',App\Http\Controllers\productController::class);
    Route::get('photo/{id}',[productController::class,'destroyPhoto'])->name("photo.destroyPhoto");     
    //routes of  category :
    Route::resource('category',categoryController::class);
    //routes of  provider :
    Route::resource('provider',ProviderController::class);
    //routes of  Client : 
    Route::resource('Client',ClientController::class);
    //routes of Store :
    Route::resource('Store',StoreController::class);
    Route::post('Store/return/{id}',[StoreController::class,'return'])->name("Store.return");   
    //routes of order :
      Route::resource('Command',CommandController::class);
        Route::group(["prefix"=>"Command" ],function(){
        Route::delete('product/{id}',[CommandController::class,'destroyProduct'])->name('Command.destroyProduct');   
        Route::get('invoice/{id}',[CommandController::class,'generateInvoice'])->name('Command.generateInvoice');   
        Route::post('{id}/payment',[CommandController::class,'payment'])->name('Command.payment');  
        Route::get('{id}/orderInfo',[CommandController::class,'orderInfo'])->name('Command.info');     
     });
});
Auth::routes();


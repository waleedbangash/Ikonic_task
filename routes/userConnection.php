<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\SugestionsController;
use App\Http\Controllers\UserController;




Route::middleware(['auth'])->group(function () {
    Route::get('get_sugestions',[SugestionsController::class,'index'])->name('sugestions.index');
    Route::post('send_request',[UserController::class,'sendRequest'])->name('send.request');
    Route::get('get_sent_request',[UserController::class,'index'])->name('sent.request');
    Route::get('get_recived_request',[UserController::class,'RecivedRequest'])->name('recived.request');
    Route::post('accept_request',[UserController::class,'acceptRequest'])->name('accept.request');
    Route::get('delete_request/{id}',[UserController::class,'destroy'])->name('delete.request');
   
    
    Route::get('get_connections',[ConnectionController::class,'index'])->name('connection.index');
    Route::get('git_commen_connection/{id}',[ConnectionController::class,'gitCommenConnection'])->name('commen.connection');
    Route::get('delete_connection/{id}',[ConnectionController::class,'destroy'])->name('delete.connection');
});

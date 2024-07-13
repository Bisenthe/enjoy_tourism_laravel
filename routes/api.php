<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;



Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/user/all',[UserController::class,'index']);
Route::get('/client/all',[ClientController::class,'index']);
Route::group(['middleware'=>['auth:sanctum']], function () {
    //
    });

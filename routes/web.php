<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::middleware("isLogin")->group(function () {
    Route::get('/login', [UserController::class , "login"])->name("login");
    Route::get('/register', [UserController::class , "register"])->name("register");
    
    Route::post('/login', [UserController::class , "signIn"]);
    Route::post('/register', [UserController::class , "signUp"]);
});

Route::middleware("auth")->group(function () {
    Route::post("/logout" , [UserController::class , "logout"]);

    Route::get('/', function () {
        return view('welcome');
    })->name("home");
});


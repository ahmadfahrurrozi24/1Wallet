<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;
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
    Route::get('/login', [UserController::class, "login"])->name("login");
    Route::get('/register', [UserController::class, "register"])->name("register");
    Route::post('/login', [UserController::class, "signIn"]);
    Route::post('/register', [UserController::class, "signUp"]);
});

Route::middleware("auth")->group(function () {
    Route::post("/logout", [UserController::class, "logout"]);

    Route::prefix('/dashboard')->group(function () {
        Route::get("/", [DashboardController::class, "index"]);
        Route::get("/history", [DashboardController::class, "history"]);
        Route::get("/insight", [DashboardController::class, "insight"]);

        Route::resource('record', RecordController::class)->except([
            "index"
        ]);

        Route::get("/profile", [DashboardController::class, "profile"]);
        Route::put("/profile", [UserController::class, "update"]);
        Route::post("/profile/changepassword", [UserController::class, "changePassword"]);
    });

    Route::get("/imgprofile/{path}", [UserController::class, "profileImageShow"]);
    // });
});

Route::get("/email/verify" , function(){
    return view("auth.email-verify" , ["title" => "Succes"]);
});

Route::get("/email/success" , function(){
    return view("auth.email-success" , ["title" => "Succes"]);
});

Route::get('/', function () {
    return view('landingpage.landingPage');
})->name("home");
// Route::middleware(["isAdmin"])->group(function () {

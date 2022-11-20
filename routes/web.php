<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::middleware("guest")->group(function () {
    Route::get('/login', [UserController::class, "login"])->name("login");
    Route::get('/register', [UserController::class, "register"])->name("register");
    Route::post('/login', [UserController::class, "signIn"]);
    Route::post('/register', [UserController::class, "signUp"]);

    Route::get('/forgot-password', [UserController::class, "forgotPassword"])->name('password.request');
    Route::post('/forgot-password', [UserController::class, "sendLinkPassword"])->name('password.email');
    Route::get('/reset-password/{token}', [UserController::class, "resetPassword"])->name('password.reset');
    Route::post('/reset-password', [UserController::class, "resettingPassword"])->name('password.update');
});

Route::middleware("auth")->group(function () {
    Route::post("/logout", [UserController::class, "logout"]);

    Route::prefix('/dashboard')->middleware("verified")->group(function () {
        Route::get("/", [DashboardController::class, "index"]);
        Route::get("/history", [DashboardController::class, "history"]);
        Route::get("/insight", [DashboardController::class, "insight"]);

        Route::resource('record', RecordController::class)->except([
            "index"
        ]);

        Route::get("/profile", [DashboardController::class, "profile"]);
        Route::put("/profile", [UserController::class, "update"]);
        Route::post("/profile/changepassword", [UserController::class, "changePassword"]);

        Route::get('/admin/category', [DashboardController::class, "categoryAdmin"]);
    });

    Route::get("/imgprofile/{path}", [UserController::class, "profileImageShow"]);

    Route::get('/email/verify', function () {
        if (auth()->user()->email_verified_at) return redirect()->to("/dashboard");
        return view("auth.email-verify", ["title" => "Email Verify"]);
    })->name('verification.notice');


    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link has been sent to your email!');
    })->middleware('throttle:6,1')->name('verification.send');
});

Route::get('/email/verify/{id}/{hash}', [UserController::class, "verifyUser"])->name('verification.verify');

Route::get('/', function () {
    return view('landingpage.landingPage');
})->name("home");
// Route::middleware(["isAdmin"])->group(function () {

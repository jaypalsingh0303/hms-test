<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

use App\Http\Middleware\IsUser;
use App\Http\Middleware\IsPatient;
use App\Http\Middleware\IsDoctor;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("auth")->group(function () {
    Route::prefix("user")->group(function () {
        Route::get("/login", [LoginController::class, "user_login"])->name("auth.user.login");
        Route::post("/authenticate", [LoginController::class, "user_login_submit"])->name("auth.user.authenticate");
        Route::get("/logout", [LoginController::class, "user_logout"])->name("auth.user.logout");
    });

    Route::prefix("patient")->group(function () {
        Route::get("/login", [LoginController::class, "patient_login"])->name("auth.patient.login");
        Route::post("/authenticate", [LoginController::class, "patient_login_submit"])->name("auth.patient.authenticate");
        Route::get("/logout", [LoginController::class, "patient_logout"])->name("auth.patient.logout");
    });

    Route::prefix("doctor")->group(function () {
        Route::get("/login", [LoginController::class, "doctor_login"])->name("auth.doctor.login");
        Route::post("/authenticate", [LoginController::class, "doctor_login_submit"])->name("auth.doctor.authenticate");
        Route::get("/logout", [LoginController::class, "doctor_logout"])->name("auth.doctor.logout");
    });

    Route::prefix("admin")->group(function () {
        Route::get("/login", [LoginController::class, "admin_login"])->name("auth.admin.login");
        Route::post("/authenticate", [LoginController::class, "admin_login_submit"])->name("auth.admin.authenticate");
        Route::get("/logout", [LoginController::class, "admin_logout"])->name("auth.admin.logout");
    });
});

Route::get("/user/dashboard", [DashboardController::class, "user_dashboard"])->middleware(IsUser::class);
Route::get("/patient/dashboard", [DashboardController::class, "patient_dashboard"])->middleware(IsPatient::class);
Route::get("/doctor/dashboard", [DashboardController::class, "doctor_dashboard"])->middleware(IsDoctor::class);
Route::get("/admin/dashboard", [DashboardController::class, "admin_dashboard"])->middleware(IsAdmin::class);

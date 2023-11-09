<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\SchoolCLassController;
use App\Http\Controllers\StudentsController;
use App\Models\SchoolCLass;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect('login');
});

Route::group(["prefix"=> ""], function () {
    Route::get("/login", [LoginController::class, 'showLoginForm'])->name('show_login_form');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get("/logout", [LoginController::class, 'logout'])->name('logout');
});




Route::group(['middleware' => ['auth']], function () {

    Route::get("/dashboard", [HomeController::class, 'dashboard'])->name('dashboard');

    // CLasses
    Route::get("/class", [SchoolCLassController::class, 'index'])->name('class.index');
    Route::get("/class/dtajax", [SchoolCLassController::class, 'dtajax'])->name('class.dtajax');
    Route::get("/class/create", [SchoolCLassController::class, 'create'])->name('class.create');
    Route::post("/add_class", [SchoolCLassController::class, 'store'])->name('class.store');
    Route::get("/class/edit/{id}", [SchoolCLassController::class, 'edit'])->name('class.edit');
    Route::get("/class/show/{id}", [SchoolCLassController::class, 'show'])->name('class.show');
    Route::post("/class/update", [SchoolCLassController::class, 'update'])->name('class.update');

    // Student
    Route::get("/student", [StudentsController::class, 'index'])->name('student.index');
    Route::get("/student/dtajax", [StudentsController::class, 'dtajax'])->name('student.dtajax');
    Route::get("/student/create", [StudentsController::class, 'create'])->name('student.create');
    Route::post("/add_student", [StudentsController::class, 'store'])->name('student.store');
    Route::get("/student/edit/{id}", [StudentsController::class, 'edit'])->name('student.edit');
    Route::get("/student/show/{id}", [StudentsController::class, 'show'])->name('student.show');
    Route::post("/student/update", [StudentsController::class, 'update'])->name('student.update');

});


<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SeasonMasterController;
use App\Http\Controllers\Admin\CropMasterController;
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
    Route::resource('season-masters', SeasonMasterController::class)->names('season-masters');
    Route::resource('crop-informations', CropMasterController::class);
    //Route::get("/season-master", [HomeController::class, 'season_master'])->name('season_master');


    //Country
    Route::get("/country", [CountryController::class, 'index'])->name('country.index');
    Route::get("/country/dtajax", [CountryController::class, 'dtajax'])->name('country.dtajax');
    Route::get("/country/create", [CountryController::class, 'create'])->name('country.create');
    Route::post("/add_country", [CountryController::class, 'store'])->name('country.store');


    //Province
    Route::get("/province", [ProvinceController::class, 'index'])->name('province.index');
    Route::get("/province/create", [ProvinceController::class, 'create'])->name('province.create');
    Route::post("/add_province", [ProvinceController::class, 'store'])->name('province.store');
    Route::get("/province_filter_by_country/{id}", [ProvinceController::class, 'filter_by_country'])->name('province.filter_by_country');

    //District
    Route::get("/district", [DistrictController::class, 'index'])->name('district.index');
    Route::get("/district/create", [DistrictController::class, 'create'])->name('district.create');
    Route::post("/add_district", [DistrictController::class, 'store'])->name('district.store');
    Route::get("/district_filter_by_province/{id}", [DistrictController::class, 'filter_by_province'])->name('district.filter_by_province');

    //Commune
    Route::get("/commune", [CommuneController::class, 'index'])->name('commune.index');
    Route::get("/commune/create", [CommuneController::class, 'create'])->name('commune.create');
    Route::post("/add_commune", [CommuneController::class, 'store'])->name('commune.store');
    Route::get("/commnue_filter_by_district/{id}", [CommuneController::class, 'filter_by_district'])->name('commnue.filter_by_district');
    
});


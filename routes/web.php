<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Profile\AdminProfileController;
use App\Http\Controllers\Admin\Specifications\ElectronicController;
use App\Http\Controllers\Admin\Specifications\TypeController;
use App\Http\Controllers\Admin\Specifications\TechnicalSpecifications;
use App\Http\Controllers\Admin\Yachts\YachtController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Auth
Route::get("/admin/login", [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::group(['middleware' => 'auth.user', 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::get('/profil',[AdminProfileController::class, 'show'])->name('profil');
    Route::post('/profil-guncelle',[AdminProfileController::class,'update'])->name('profil-guncelle');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    //Tekneler
    Route::get('/tekneler', [YachtController::class, 'index'])->name('tekneler');
    Route::post('/update-yacht-status', [YachtController::class, 'updateStatus'])->name('update_yacht_status');
    Route::get('/tekne-olustur', [YachtController::class, 'create'])->name('tekne-olustur');
    Route::post('/tekne-olustur/kaydet', [YachtController::class, 'store'])->name('tekne-olustur-kaydet');
    Route::get('/tekne-guncelle/{id}', [YachtController::class, 'update'])->name('tekne-guncelle');
    Route::post('/tekne-guncelle/kaydet/{id}', [YachtController::class, 'edit'])->name('tekne-guncelle-kaydet');
    Route::delete('/tekne-sil/{id}', [YachtController::class, 'destroy'])->name('tekne-sil');

    //Tekne tipleri
    Route::get('/tekne-turleri', [TypeController::class, 'index'])->name('tekne-turleri');
    Route::post('/update-status', [TypeController::class, 'updateStatus'])->name('update_status');
    Route::post('/tip-olustur', [TypeController::class, 'store'])->name('tip-olustur');
    Route::post('/tip-duzenle', [TypeController::class, 'edit'])->name('tip-duzenle');
    Route::delete('/tip-sil/{id}', [TypeController::class, 'delete'])->name('tip-sil');

    //Teknik özellikler
    Route::get('/teknik-ozellikler', [TechnicalSpecifications::class, 'index'])->name('teknik-ozellikler');
    Route::post('update-specification-status', [TechnicalSpecifications::class, 'updateStatus'])->name('update-specification-status');
    Route::post('/teknik-ozellik-olustur', [TechnicalSpecifications::class, 'store'])->name('teknik-ozellik-olustur');
    Route::post('/teknik-ozellik-duzenle', [TechnicalSpecifications::class, 'edit'])->name('teknik-ozellik-duzenle');
    Route::delete('teknik-ozellik-sil/{id}', [TechnicalSpecifications::class, 'delete']);

    //Elektronik Sistemler
    Route::get('/elektronik-sistemler', [ElectronicController::class, 'index'])->name('elektronik-sistemler');
    Route::post('/elektronik-sistem-olustur', [ElectronicController::class, 'store'])->name('elektronik-sistem-olustur');
    Route::post('/update-electronic-status', [ElectronicController::class, 'updateStatus']);
    Route::post('/elektronik-duzenle', [ElectronicController::class, 'edit']);
    Route::delete('elektronik-sil/{id}', [ElectronicController::class, 'delete']);
});

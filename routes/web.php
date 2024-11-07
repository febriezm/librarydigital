<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\PeminjamanController as PeminjamanController;
use App\Http\Controllers\admin\BookController as BookController;
use App\Http\Controllers\admin\UserController as UserController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\KategoribukuController as KategoribukuController;
use App\Http\Controllers\petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\petugas\LoginController as PetugasLoginController;



Route::get('/', [PublicController::class, 'index'])->name('welcome');

Route::group(['prefix' => 'account'],function(){

    // Guest Middleware
    Route::group(['middleware' => 'guest'],function(){
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::get('register',[LoginController::class,'register'])->name('account.register');
        Route::post('process-register',[LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
    });

    // Authentiated Middleware
    Route::group(['middleware' => 'auth'],function(){
        Route::get('logout',[LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard',[DashboardController::class,'index'])->name('account.dashboard');

        Route::get('profile',[DashboardController::class,'profile'])->name('account.profile');
        Route::post('kembali',[DashboardController::class,'kembali'])->name('components.koleksi-table');
        
        Route::get('books',[DashboardController::class,'books'])->name('account.books');
        Route::post('books',[DashboardController::class,'comment'])->name('account.comment');
        
        Route::get('borrow',[DashboardController::class,'borrow'])->name('account.borrow');
        Route::post('borrow',[DashboardController::class,'store'])->name('account.store');
        
        
        Route::get('reviews',[DashboardController::class,'reviews'])->name('account.reviews');
    });

});


Route::group(['prefix' => 'petugas'],function(){

    // Guest Middleware for petugas
    Route::group(['middleware' => 'petugas.guest'],function(){
    Route::get('login',[PetugasLoginController::class,'index'])->name('petugas.login');
    Route::post('authenticate',[PetugasLoginController::class,'authenticate'])->name('petugas.authenticate');
    });
    
    // Authentiated Middleware for petugas
    Route::group(['middleware' => 'petugas.auth'],function(){
    Route::get('logout',[PetugasLoginController::class,'logout'])->name('petugas.logout');
    
    Route::controller(PetugasDashboardController::class)->group(function(){
    Route::get('dashboard', 'index')->name('petugas.dashboard');
    
    Route::get('buku', 'buku')->name('petugas.buku');
    Route::get('create', 'create')->name('petugas.create');
    Route::post('store', 'store')->name('petugas.store');
    Route::get('{books}/edit','edit')->name('petugas.edit');
    Route::put('{books}', 'update')->name('petugas.update');
    Route::delete('{books}/buku', 'destroy')->name('petugas.destroy');
    
    Route::get('peminjaman', 'peminjaman')->name('petugas.peminjaman');
    Route::delete('{peminjamen}/peminjaman', 'delete')->name('peminjaman.delete');
    Route::get('cetak-peminjaman', 'cetak')->name('petugas.cetak');

    Route::get('jenis', 'jenis')->name('petugas.jenis');
    Route::post('jenis/add', 'add')->name('jenis.add');
    Route::delete('{kategoribukus}/jenis', 'drop')->name('jenis.drop');
    });
    
    });
    
});


Route::group(['prefix' => 'admin'],function(){

    // Guest Middleware For Admin
    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });

    // Authentiated Middleware For Admin
    Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('logout',[AdminLoginController::class,'logout'])->name('admin.logout');

        Route::controller(BookController::class)->group(function(){
            Route::get('bookdata', 'index')->name('books.bookdata');
            Route::get('books/create', 'create')->name('books.create');
            Route::post('books/dashboard', 'store')->name('books.store');
            Route::get('{books}/editdata','edit')->name('books.edit');
            Route::put('{books}', 'update')->name('books.update');
            Route::delete('{books}', 'destroy')->name('books.destroy');
        });

        Route::controller(UserController::class)->group(function(){
            Route::get('userdata', 'index')->name('users.userdata');
            Route::get('users/create', 'create')->name('users.create');
            Route::post('userdata/dashboard', 'store')->name('users.store');
            Route::get('{users}/edituser','edit')->name('users.edituser');
            Route::put('{users}/user', 'update')->name('users.update');
            Route::delete('{users}/user', 'destroy')->name('users.destroy');
        });

        Route::controller(KategoribukuController::class)->group(function(){
            Route::get('kategoridata', 'index')->name('kategori.kategoridata');
            Route::post('kategori/dashboard', 'store')->name('kategori.store');
            Route::delete('{kategoribukus}/kategoridata', 'destroy')->name('kategori.destroy');
        });

        Route::controller(PeminjamanController::class)->group(function(){
            Route::get('peminjaman', 'index')->name('peminjaman.peminjaman');
            Route::delete('{peminjamen}/list', 'destroy')->name('peminjaman.destroy');
            Route::get('cetak-peminjaman', 'cetak')->name('peminjaman.cetak');
            Route::delete('{peminjamen}/peminjaman', 'destroy')->name('peminjaman.destroy');
        });

        Route::get('ulasan',[AdminDashboardController::class,'ulasan'])->name('admin.ulasan');
        Route::delete('{ulasanbuku}/ulasan',[AdminDashboardController::class,'destroy'])->name('ulasan.destroy');

    });

});










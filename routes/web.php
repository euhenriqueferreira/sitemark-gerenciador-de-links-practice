<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\Links\CreateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){
    Route::controller(LoginController::class)->group(function(){
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'login');
    });
    
    Route::controller(RegisterController::class)->group(function(){
        Route::get('/register', 'index')->name('register');
        Route::post('/register', 'register');
    });
});

Route::middleware('auth')->group(function(){
    Route::prefix('link')->name('links.')->controller(LinkController::class)->group(function(){
        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store');
    
        Route::get('/{link}/edit', 'edit')->name('edit');
        Route::put('/{link}/edit', 'update');
    
        Route::patch('/{link}/up', 'up')->name('up');
        Route::patch('/{link}/down', 'down')->name('down');
    
        Route::delete('/{link}/delete', 'destroy')->name('delete');
    });
    
    Route::get('/logout', LogoutController::class)->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update']);
});
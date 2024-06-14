<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::get('/', function () {
    return redirect()->route('events.index');
});

// Маршруты аутентификации
Auth::routes();

// Маршруты для сущностей Event и Venue
Route::middleware('auth')->group(function () {
    Route::resource('events', EventController::class);
    Route::resource('venues', VenueController::class);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


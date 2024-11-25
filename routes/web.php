<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/success', function () {
    return redirect()->route('booking.index')->with('success', 'Pago exitoso y reserva creada.');
})->name('success');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('activities', ActivityController::class);
    Route::resource('room', RoomController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('booking', BookingController::class);
}); 

require __DIR__.'/auth.php';
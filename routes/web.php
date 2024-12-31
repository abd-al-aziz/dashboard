<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AdoptionController;
use App\Http\Controllers\custumer\DefaultHomeController;
use App\Http\Controllers\custumer\AboutController;
use App\Http\Controllers\custumer\ServicesController;
use App\Http\Controllers\custumer\RoomsController;
use App\Http\Controllers\custumer\PhotosController;
use App\Http\Controllers\custumer\ContactController;
use App\Http\Controllers\custumer\AdoptionsController;
use App\Http\Controllers\custumer\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('/frontend/basic/home');
});
Route::get('/home', [DefaultHomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/room', [RoomsController::class, 'index'])->name('rooms');
Route::get('/photo-gallery', [PhotosController::class, 'index'])->name('photo-gallery');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/adoptions', [AdoptionsController::class, 'index'])->name('adoptions');

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('admin.dashboard-alt', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard.alt');

        // Feature-Specific Routes
        // Bookings
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
        Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
        Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
        Route::get('/bookings/edit/{booking}', [BookingController::class, 'edit'])->name('bookings.edit');
        Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
        Route::delete('/bookings/destroy/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
        Route::post('/bookings/{id}/update-status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');

        // Pets
        Route::resource('pets', PetController::class);

        // Rooms
        Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
        Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
        Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
        Route::get('/rooms/edit/{room}', [RoomController::class, 'edit'])->name('rooms.edit');
        Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
        Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');

        // Reviews
        Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
        Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
        Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
        Route::put('/reviews/{review}/status/{status}', [ReviewController::class, 'updateStatus'])->name('reviews.updateStatus');
        Route::get('/reviews/update-status/{reviewId}/{status}', [ReviewController::class, 'updateStatus'])->name('reviews.update.status');

        // Adoption
        Route::resource('adoption', AdoptionController::class);
        Route::post('/adoption/request/{adoption}', [AdoptionController::class, 'requestAdoption'])->name('adoption.request');

        // Services
        Route::resource('service', ServiceController::class);
        Route::get('/service', [ServiceController::class, 'index'])->name('service.index');

        Route:: get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});

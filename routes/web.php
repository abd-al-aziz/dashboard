<?php
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\custumer\ServicesDetailsController;
use App\Http\Controllers\custumer\TeamDetailsController;
use App\Http\Controllers\custumer\RoomsController;
use App\Http\Controllers\custumer\PhotosController;
use App\Http\Controllers\custumer\ContactController;
use App\Http\Controllers\custumer\AdoptionsController;








Route::get('/', function () {
    return view('/frontend/basic/home');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// Route for bookings
Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::delete('/bookings/destroy/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
Route::get('/bookings/edit/{booking}', [BookingController::class, 'edit'])->name('bookings.edit');
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');
Route::resource('pets', PetController::class)->middleware('auth');
Route::post('/bookings/{id}/update-status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');

Route::resource('adoption', AdoptionController::class);


Route::middleware('auth')->group(function () {
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/adoption', [AdoptionController::class, 'index'])->name('adoption.index');
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/edit/{room}', [RoomController::class, 'edit'])->name('rooms.edit'); 
    Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update'); 
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
   
});
//reviews routes
Route::middleware('auth')->group(function () {
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::put('/reviews/{review}/status/{status}', [ReviewController::class, 'updateStatus'])->name('reviews.updateStatus');
    Route::get('/reviews/update-status/{reviewId}/{status}', [ReviewController::class, 'updateStatus'])->name('reviews.update.status');
});




Route::resource('users', UserController::class);
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });

    

    
   

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index']);
    });
 

    // dashboard routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('dashboard-alt', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard.alt');
    });
});
Route::resource('service', ServiceController::class);
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');

});
// template 
Route::get('/home', [DefaultHomeController::class, 'index'])->name('home');
Route ::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/services-details', [ServicesDetailsController::class, 'index'])->name('services-details');
// Route::get('/team-details', [TeamDetailsController::class, 'index'])->name('team-details');
Route::get('/room', [RoomsController::class, 'index'])->name('rooms');
Route::get('/photo-gallery', [PhotosController::class, 'index'])->name('photo-gallery');
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts');
Route::get('/adoptions', [AdoptionsController::class, 'index'])->name('adoptions');






require __DIR__.'/auth.php';


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


// Route::get('/', function () {
//     return view('dashboard');
// });
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

Route::middleware('auth')->group(function () {
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');
    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/edit/{room}', [RoomController::class, 'edit'])->name('rooms.edit');  // هذا هو روت التعد
    Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update'); // هذا هو روت التحديث
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
    Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    

    // User Login Routes
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [UserAuthController::class, 'login']);
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');

    Route::middleware(['auth:web'])->group(function () {
        Route::get('/dashboard', [UserDashboardController::class, 'index']);
    }); mmm
 

    // dashboard routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('dashboard-alt', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard.alt');
    });
});
Route::resource('services', ServiceController::class);
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

});

require __DIR__.'/auth.php';


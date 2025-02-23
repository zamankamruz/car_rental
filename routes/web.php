<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Frontend\PageController as FrontPageController;
use App\Http\Controllers\Frontend\CarController as FrontCarController;
use App\Http\Controllers\Frontend\RentalController as FrontRentalController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;



// Frontend Routes
Route::get('/', [FrontPageController::class, 'home'])->name('frontend.home');
Route::get('/about', [FrontPageController::class, 'about'])->name('frontend.about');
Route::get('/contact', [FrontPageController::class, 'contact'])->name('frontend.contact');

Route::get('/cars', [FrontCarController::class, 'index'])->name('frontend.cars.index');
Route::get('/cars/{car}', [FrontCarController::class, 'show'])->name('frontend.cars.show');

Route::middleware('auth')->group(function () {
    Route::get('/rentals', [FrontRentalController::class, 'index'])->name('frontend.rentals.index');
    Route::get('/rentals/create/{car}', [FrontRentalController::class, 'create'])->name('frontend.rentals.create');
    Route::post('/rentals/store/{car}', [FrontRentalController::class, 'store'])->name('frontend.rentals.store');
    Route::post('/rentals/cancel/{rental}', [FrontRentalController::class, 'cancel'])->name('frontend.rentals.cancel');
});


Route::middleware('auth')->group(function () {
    // Admin Dashboard

    // User Dashboard
    Route::get('user/dashboard', [DashboardController::class, 'user_dashboard'])->name('user.dashboard');

    // Profile Updates

    Route::get('/update-profile', [DashboardController::class, 'profile'])->name('dashboard.Profile');
    Route::get('/update-password', [DashboardController::class, 'password'])->name('dashboard.Password');

    Route::post('/dashboard/update-profile', [DashboardController::class, 'updateProfile'])->name('dashboard.updateProfile');
    Route::post('/dashboard/update-password', [DashboardController::class, 'updatePassword'])->name('dashboard.updatePassword');


});



// Admin Routes (use middleware to restrict to admin users)
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard Overview can be added here

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Car management
    Route::get('cars', [AdminCarController::class, 'index'])->name('cars.index');
    Route::get('cars/create', [AdminCarController::class, 'create'])->name('cars.create');
    Route::post('cars', [AdminCarController::class, 'store'])->name('cars.store');
    Route::get('cars/{car}', [AdminCarController::class, 'show'])->name('cars.show');
    Route::get('cars/{car}/edit', [AdminCarController::class, 'edit'])->name('cars.edit');
    Route::put('cars/{car}', [AdminCarController::class, 'update'])->name('cars.update');
    Route::delete('cars/{car}', [AdminCarController::class, 'destroy'])->name('cars.destroy');

    // Rental management
    Route::get('rentals', [AdminRentalController::class, 'index'])->name('rentals.index');
    Route::get('rentals/{rental}', [AdminRentalController::class, 'show'])->name('rentals.show');
    Route::get('rentals/{rental}/edit', [AdminRentalController::class, 'edit'])->name('rentals.edit');
    Route::put('rentals/{rental}', [AdminRentalController::class, 'update'])->name('rentals.update');
    Route::delete('rentals/{rental}', [AdminRentalController::class, 'destroy'])->name('rentals.destroy');

    // Customer management
    Route::get('customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/{customer}', [AdminCustomerController::class, 'show'])->name('customers.show');
    Route::get('customers/{customer}/edit', [AdminCustomerController::class, 'edit'])->name('customers.edit');
    Route::put('customers/{customer}', [AdminCustomerController::class, 'update'])->name('customers.update');
    Route::delete('customers/{customer}', [AdminCustomerController::class, 'destroy'])->name('customers.destroy');

     // FIXED: Rental History Route (Now inside admin group)
     Route::get('customers/{customer}/rentals', [AdminCustomerController::class, 'rentalHistory'])->name('customers.rentals');
});





require __DIR__.'/auth.php';




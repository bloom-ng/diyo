<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FleetController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index']);

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);

    Route::post('subscribe', [NewsletterController::class, 'subscribe']);
});

// Booking Routes
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // User Management Routes
    Route::resource('users', UserController::class);

    Route::resource('bookings', BookingController::class);
    Route::get('bookings/search', [BookingController::class, 'index'])->name('bookings.search');

    Route::resource('fleet', FleetController::class);

    // Contacts routes
    Route::get('contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');

    // Newsletter routes
    Route::get('newsletters', [NewsletterController::class, 'index'])->name('newsletters.index');
    Route::get('newsletters/export', [NewsletterController::class, 'exportCSV'])->name('newsletters.export');

    // Blog routes
    Route::resource('blogs', BlogController::class);

    // Upload route for TinyMCE
    Route::post('/upload', [UploadController::class, 'upload'])->name('upload');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

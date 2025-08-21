<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\QuoteController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Backend\PermissionController;

// 🔹 Static pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'site.about')->name('about');
Route::view('/contact', 'site.contact')->name('contact');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');

// 🔹 Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/car', [ServiceController::class, 'carservice'])->name('services.car-shipping');
Route::get('/services/motorcycle', [ServiceController::class, 'bikeservice'])->name('services.motorcycle-shipping');
Route::get('/services/heavy', [ServiceController::class, 'heavyservice'])->name('services.heavy-equipment-shipping');

// 🔹 Quotes
Route::get('/quote', [QuoteController::class, 'index'])->name('quote.index');
Route::get('/car', [QuoteController::class, 'car'])->name('quote.car');
Route::get('/atv-utv', [QuoteController::class, 'atv_utv'])->name('quote.atv_utv');
Route::get('/motorcycle', [QuoteController::class, 'motorcycle'])->name('quote.motorcycle');

// submit quote
Route::post('/submit_quote', [QuoteController::class, 'submitQuote'])->name('frontend.submit.quote');

// 🔹 Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/detail', [BlogController::class, 'show'])->name('blog.show');

// 🔐 Auth & Profile
Route::middleware(['auth', 'check_active'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard.index'))->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);

    Route::get('/quotes', [AdminController::class, 'allQuotes'])->name('dashboard.quotes.index');
    Route::get('/quotes/{id}', [AdminController::class, 'quoteDetail'])->name('dashboard.quotes.details');
    Route::get('/create', [AdminController::class, 'quoteCreate'])->name('dashboard.quotes.create');

    Route::get('/users', [UserManagementController::class, 'allUsers'])->name('dashboard.users.index');
    Route::get('/users/{id}', [UserManagementController::class, 'userEdit'])->name('dashboard.users.edit');
    Route::put('/users/{id}', [UserManagementController::class, 'userUpdate'])->name('dashboard.users.update');
    Route::delete('/users/{id}', [UserManagementController::class, 'userDestroy'])->name('dashboard.users.destroy');
    Route::post('{user}/toggle-active', [UserManagementController::class, 'toggleActive'])->name('users.toggleActive');
    Route::post('{user}/force-logout', [UserManagementController::class, 'forceLogout'])->name('users.forceLogout');

    Route::get('/activity_logs', [AdminController::class, 'activityLogs'])->name('view.activity_logs');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});

require __DIR__ . '/auth.php';

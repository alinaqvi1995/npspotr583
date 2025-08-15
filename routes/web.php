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

// 🔹 Static pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'site.about')->name('about');
Route::view('/contact', 'site.contact')->name('contact');

// 🔹 Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/car', [ServiceController::class, 'carservice'])->name('services.car-shipping');
Route::get('/services/motorcycle', [ServiceController::class, 'bikeservice'])->name('services.motorcycle-shipping');
Route::get('/services/heavy', [ServiceController::class, 'heavyservice'])->name('services.heavy-equipment-shipping');

// 🔹 Quotes
Route::get('/quote', [QuoteController::class, 'index'])->name('quote.index');
Route::get('/car', [QuoteController::class, 'car'])->name('quote.car');
Route::get('/atv-utv', [QuoteController::class, 'motorcycle'])->name('quote.atv_utv');
Route::get('/motorcycle', [QuoteController::class, 'motorcycle'])->name('quote.motorcycle');

// submit quote
Route::post('/submit_quote', [QuoteController::class, 'submitQuote'])->name('frontend.submit.quote');

// 🔹 Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// 🔐 Auth & Profile
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('admin.index'))->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::get('/quotes', [AdminController::class, 'allQuotes'])->name('admin.quotes.index');
    Route::get('/quotes/{id}', [AdminController::class, 'quoteDetail'])->name('admin.quotes.details');

    Route::resource('roles', RoleController::class);
});

require __DIR__ . '/auth.php';

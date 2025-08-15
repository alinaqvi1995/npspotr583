<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\QuoteController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RoleController;

// 🔹 Static pages
Route::view('/', 'site.home')->name('home');
Route::view('/about', 'site.about')->name('about');
Route::view('/contact', 'site.contact')->name('contact');

// 🔹 Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// 🔹 Quotes
Route::get('/quote', [QuoteController::class, 'index'])->name('quote.index');
Route::get('/car', [QuoteController::class, 'car'])->name('quote.car');
Route::get('/motorcycle', [QuoteController::class, 'motorcycle'])->name('quote.motorcycle');
Route::get('/golf-cart', [QuoteController::class, 'golf_cart'])->name('quote.golf_cart');
Route::get('/atv-utv', [QuoteController::class, 'atv_utv'])->name('quote.atv_utv');
Route::get('/boat', [QuoteController::class, 'boat'])->name('quote.boat');
Route::get('/heavy', [QuoteController::class, 'heavyEquipment'])->name('quote.heavyEquipment');
Route::get('/freight', [QuoteController::class, 'freight'])->name('quote.freight');
Route::get('/roro-shipping', [QuoteController::class, 'roro'])->name('quote.roro');
Route::get('/recreational-vehicle', [QuoteController::class, 'recreationalVehicle'])->name('form.recreational-vehicle');
Route::get('/quote-form', [QuoteController::class, 'quoteForm'])->name('quote.form.combine');
Route::get('/commercial-truck-transport', [QuoteController::class, 'commercialTruck'])->name('commercial.truck.transport');
Route::get('/construction_transport', [QuoteController::class, 'constructionTransport'])->name('frontend.forms.construction_transport');
Route::get('/excavator', [QuoteController::class, 'excavator'])->name('frontend.forms.excavator');
Route::get('/farm_transport', [QuoteController::class, 'farmTransport'])->name('frontend.forms.farm_transport');
Route::get('/rv_transport', [QuoteController::class, 'rvTransport'])->name('frontend.forms.rv_transport');

// submit quote
Route::post('/submit_quote', [QuoteController::class, 'submitQuote'])->name('frontend.submit.quote');

// 🔹 Blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// 🔐 Auth & Profile
Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', fn() => view('admin.index'))->middleware('verified')->name('dashboard');

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

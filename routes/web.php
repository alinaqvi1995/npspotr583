<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ServiceController as FrontendServiceController;
use App\Http\Controllers\Frontend\QuoteController;
use App\Http\Controllers\Frontend\BlogController as FrontendBlogController;
use App\Http\Controllers\Backend\BlogController as BackendBlogController;
use App\Http\Controllers\Backend\ServiceController as BackendServiceController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\QuoteManagementController;
use App\Http\Controllers\ZipcodeController;

// 🔹 Static pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'site.about')->name('about');
Route::view('/contact', 'site.contact')->name('contact');
Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');

// 🔹 Services
Route::get('/all-services', [FrontendServiceController::class, 'index'])->name('all_services.index');
Route::get('/service/{slug}', [FrontendServiceController::class, 'show'])->name('services.show.detail');
Route::get('/services/car', [FrontendServiceController::class, 'carservice'])->name('services.car-shipping');
Route::get('/services/motorcycle', [FrontendServiceController::class, 'bikeservice'])->name('services.motorcycle-shipping');
Route::get('/services/heavy', [FrontendServiceController::class, 'heavyservice'])->name('services.heavy-equipment-shipping');

// 🔹 Quotes
Route::get('/quote', [QuoteController::class, 'index'])->name('quote.index');
Route::get('/car', [QuoteController::class, 'car'])->name('quote.car');
Route::get('/atv-utv', [QuoteController::class, 'atv_utv'])->name('quote.atv_utv');
Route::get('/motorcycle', [QuoteController::class, 'motorcycle'])->name('quote.motorcycle');

// submit quote
Route::post('/submit_quote', [QuoteController::class, 'submitQuote'])->name('frontend.submit.quote');

// 🔹 Blog
Route::get('/blog', [FrontendBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [FrontendBlogController::class, 'show'])->name('blog.show');

// zipcode
Route::get('/zipcodes/search', [ZipcodeController::class, 'search'])->name('zipcodes.search');

// models by make
Route::get('/vehicles/models', [QuoteController::class, 'getModels'])->name('vehicles.models');

// locations search
Route::get('/search-location', [App\Http\Controllers\ZipcodeController::class, 'searchByLocation'])
    ->name('zipcode.searchByLocation');



// 🔐 Auth & Profile
Route::middleware(['auth', 'check_active'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard.index'))->middleware('verified')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::get('/get_subcategories_by_category/{category_id}', [SubcategoryController::class, 'getSubcategories'])->name('subcategories.by.category');

    Route::get('/invoice', [QuoteManagementController::class, 'invoice'])->name('dashboard.invoice.index');
    Route::get('/quotes', [QuoteManagementController::class, 'allQuotes'])->name('dashboard.quotes.index');
    Route::get('/quotes/{id}', [QuoteManagementController::class, 'quoteDetail'])->name('dashboard.quotes.details');
    Route::get('/add_new_quote', [QuoteManagementController::class, 'quoteCreate'])->name('dashboard.quotes.create');
    Route::get('/edit_quote/{id}', [QuoteManagementController::class, 'quoteEdit'])->name('dashboard.quotes.edit');
    Route::put('/update_quote', [QuoteManagementController::class, 'quoteUpdate'])->name('dashboard.quotes.update');

    Route::get('/users', [UserManagementController::class, 'allUsers'])->name('dashboard.users.index');
    Route::get('/users/{id}', [UserManagementController::class, 'userEdit'])->name('dashboard.users.edit');
    Route::put('/users/{id}', [UserManagementController::class, 'userUpdate'])->name('dashboard.users.update');
    Route::delete('/users/{id}', [UserManagementController::class, 'userDestroy'])->name('dashboard.users.destroy');
    Route::post('{user}/toggle-active', [UserManagementController::class, 'toggleActive'])->name('users.toggleActive');
    Route::post('{user}/force-logout', [UserManagementController::class, 'forceLogout'])->name('users.forceLogout');

    Route::get('/activity_logs', [AdminController::class, 'activityLogs'])->name('view.activity_logs');

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::resource('blogs', BackendBlogController::class);

    Route::resource('services', BackendServiceController::class);
});

require __DIR__ . '/auth.php';


// Route::get('/categories', [CategoryController::class, 'index'])
//     ->middleware('permission:view-categories');


//     Route::get('/dashboard', fn() => view('dashboard'))
//     ->middleware('role:admin|editor');
    

//     Route::get('/categories', [CategoryController::class, 'index'])
//     ->middleware('role_or_permission:admin|editor,view_categories|edit_categories');

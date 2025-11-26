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
use App\Http\Controllers\Backend\StateController as BackendStateController;
use App\Http\Controllers\Backend\ServiceController as BackendServiceController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserManagementController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\QuoteManagementController;
use App\Http\Controllers\Backend\UserTrustedIpController;
use App\Http\Controllers\ZipcodeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\OrderFormController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Frontend\StateFrontendController;


// 🔹 Static pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/states_index', [StateFrontendController::class, 'index'])->name('states.index');
Route::get('/states/{slug}', [StateFrontendController::class, 'show'])->name('states.show');

Route::get('/quote-form', [HomeController::class, 'multiform'])->name('multiform');
Route::view('/contact', 'site.contact')->name('contact');
Route::get('/track-order', [HomeController::class, 'trackOrder'])->name('track.order');
Route::post('/track-order/fetch', [HomeController::class, 'fetchOrder'])->name('track.order.fetch');


Route::get('/privacy-policy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/trems&conditions', [HomeController::class, 'trems'])->name('trems');

// 🔹 Services
Route::get('/all-services', [FrontendServiceController::class, 'index'])->name('all_services.index');
Route::get('/service/{slug}', [FrontendServiceController::class, 'show'])->name('services.show.detail');
Route::get('/services/car', [FrontendServiceController::class, 'carservice'])->name('services.car-shipping');
Route::get('/services/motorcycle', [FrontendServiceController::class, 'bikeservice'])->name('services.motorcycle-shipping');
Route::get('/services/heavy', [FrontendServiceController::class, 'heavyservice'])->name('services.heavy-equipment-shipping');
Route::get('/services/open-transport', [HomeController::class, 'openTransport'])->name('service.open');
Route::get('/services/enclosed-transport', [HomeController::class, 'enclosedTransport'])->name('service.enclosed');
Route::get('/services/tow-away', [HomeController::class, 'towAway'])->name('service.tow');
Route::get('/services/driveaway', [HomeController::class, 'driveAway'])->name('service.drive');
// 🔹 Quotes
Route::get('/quote', [QuoteController::class, 'index'])->name('quote.index');
Route::get('/car', [QuoteController::class, 'car'])->name('quote.car');

Route::get('/get-makes', [HomeController::class, 'getMakes'])->name('get.makes');


Route::get('/get-models', [HomeController::class, 'getModels'])->name('get.models');
// Route::get('/vehicles/models', [HomeController::class, 'getModels'])->name('vehicles.models');
Route::get('/atv-utv', [QuoteController::class, 'atv_utv'])->name('quote.atv_utv');
Route::get('/motorcycle', [QuoteController::class, 'motorcycle'])->name('quote.motorcycle');

// submit quote
Route::post('/submit_quote', [QuoteController::class, 'submitQuote'])->name('frontend.submit.quote');
Route::get('/thank-you', function () {
    return view('frontend.thankyou');
})->name('frontend.thankyou');


// 🔹 Blog
Route::get('/blog', [FrontendBlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [FrontendBlogController::class, 'show'])->name('blog.show');

// zipcode
Route::get('/zipcodes/search', [ZipcodeController::class, 'search'])->name('zipcodes.search');

// models by make
Route::get('/vehicles/models', [QuoteController::class, 'getModels'])->name('vehicles.models');

// locations search
Route::get('/search-location', [ZipcodeController::class, 'searchByLocation'])
    ->name('zipcode.searchByLocation');

Route::get('/verify-otp', [OtpController::class, 'showVerifyForm'])->name('verify.otp');
Route::post('/verify-otp', [OtpController::class, 'verifyOtp'])->name('verify.otp.post');
Route::get('/resend-otp', [OtpController::class, 'resendOtp'])->name('resend.otp');

// order form for customer
Route::get('/order-form/{encrypted}', [OrderFormController::class, 'orderForm'])
    ->name('quotes.orderForm');
Route::post('/quote/{encrypted}/submit-order-form', [OrderFormController::class, 'submitOrderForm'])
    ->name('site.quote.submitOrderForm');

// 🔐 Auth & Profile
Route::middleware(['auth', 'check_active', 'otp.verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard.index'))->middleware('verified')->name('dashboard');

    Route::resource('trusted-ips', UserTrustedIpController::class)->except(['show']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::get('/get_subcategories_by_category/{category_id}', [SubcategoryController::class, 'getSubcategories'])->name('subcategories.by.category');

    Route::get('/invoice', [QuoteManagementController::class, 'invoice'])->name('dashboard.invoice.index');
    Route::get('/quotes/view-all/{status}', [QuoteManagementController::class, 'allQuotes'])->name('dashboard.quotes.index');
    // Route::get('/quotes', [QuoteManagementController::class, 'allQuotes'])->name('dashboard.quotes.index');
    Route::get('/view-order/{id}', [QuoteManagementController::class, 'quoteDetail'])->name('dashboard.quotes.details');
    Route::get('/add_new_quote', [QuoteManagementController::class, 'quoteCreate'])->name('dashboard.quotes.create');
    Route::get('/edit_quote/{id}', [QuoteManagementController::class, 'quoteEdit'])->name('dashboard.quotes.edit');
    Route::put('/quotes/{quote}', [QuoteManagementController::class, 'quoteUpdate'])->name('dashboard.quotes.update');
    Route::patch('/quotes/{quote}/status', [QuoteManagementController::class, 'updateStatus'])
        ->name('dashboard.quotes.updateStatus');


    Route::middleware(['admin'])->group(function () {
        Route::resource('add-states', BackendStateController::class);
        Route::get('/users', [UserManagementController::class, 'allUsers'])->name('dashboard.users.index');
        Route::get('/users/create', [UserManagementController::class, 'userCreate'])->name('dashboard.users.create');
        Route::post('/users', [UserManagementController::class, 'userStore'])->name('dashboard.users.store');
        Route::delete('/users/{id}', [UserManagementController::class, 'userDestroy'])->name('dashboard.users.destroy');
        Route::post('{user}/toggle-active', [UserManagementController::class, 'toggleActive'])->name('users.toggleActive');
        Route::post('{user}/force-logout', [UserManagementController::class, 'forceLogout'])->name('users.forceLogout');

        Route::get('/activity_logs', [AdminController::class, 'activityLogs'])->name('view.activity_logs');

        Route::resource('roles', RoleController::class);

        Route::resource('permissions', PermissionController::class);
    });

    Route::get('/users/{id}', [UserManagementController::class, 'userEdit'])->name('dashboard.users.edit');
    Route::put('/users/{id}', [UserManagementController::class, 'userUpdate'])->name('dashboard.users.update');

    Route::resource('blogs', BackendBlogController::class);


    Route::resource('services', BackendServiceController::class);

    // quote report
    Route::get('/reports/quotes-histories', [ReportController::class, 'quotesHistoriesReport'])
        ->name('reports.quotes.histories');

    // send order
    Route::post('/dashboard/quotes/send-order-form', [OrderFormController::class, 'sendOrderForm'])
        ->name('dashboard.quotes.sendOrderForm');

    Route::prefix('/order-forms')->name('dashboard.orderForms.')->middleware(['auth'])->group(function () {
        Route::get('/', [OrderFormController::class, 'index'])->name('index');
        Route::get('/{orderForm}', [OrderFormController::class, 'show'])->name('show');
        Route::get('/{orderForm}/download', [OrderFormController::class, 'download'])->name('download'); // optional PDF download
    });

    Route::prefix('dashboard/quotes')->name('dashboard.quotes.')->group(function () {
        Route::get('logs/{quote}', [QuoteManagementController::class, 'logs'])->name('logs');
        Route::get('agentHistory/{quote}', [QuoteManagementController::class, 'agentHistory'])->name('agentHistory');
        Route::post('agentHistory/store', [QuoteManagementController::class, 'storeAgentHistory'])->name('agentHistory.store');
        Route::get('{id}/histories', [QuoteManagementController::class, 'histories'])->name('histories');
    });

    Route::get('/quotes/{id}/allowed-statuses', [QuoteManagementController::class, 'getAllowedStatuses'])
    ->name('dashboard.quotes.allowedStatuses');
});

require __DIR__ . '/auth.php';


// Route::get('/categories', [CategoryController::class, 'index'])
//     ->middleware('permission:view-categories');


//     Route::get('/dashboard', fn() => view('dashboard'))
//     ->middleware('role:admin|editor');
    

//     Route::get('/categories', [CategoryController::class, 'index'])
//     ->middleware('role_or_permission:admin|editor,view_categories|edit_categories');

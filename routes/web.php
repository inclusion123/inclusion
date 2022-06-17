<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ChildServiceController;
use App\Http\Controllers\Admin\ServiceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::name('front.')->group(function () {
    Route::get('/', function () {
        return view('front.landing_page');
    })->name('index');

    // AboutUs Pages Route 
    Route::get('about-us', [App\Http\Controllers\front\pages\AboutUsController::class, 'index'])->name('about');

    // Service Pages Route 
    Route::get('services', [App\Http\Controllers\front\pages\ServicesController::class, 'index'])->name('service');

    Route::get('service-detail/{slug}', [App\Http\Controllers\front\pages\ServicesController::class, 'service_detail']);

 

    // Blog Pages Route
    Route::get('blogs', [App\Http\Controllers\front\pages\BlogController::class, 'blog_grid'])->name('blog_grid');
    Route::get('blog-detail', [App\Http\Controllers\front\pages\BlogController::class, 'blog_detail'])->name('blog_detail');

    //Company Pages Route
    Route::get('feature', [App\Http\Controllers\front\pages\CompanyController::class, 'feature'])->name('feature');
    Route::get('team-members', [App\Http\Controllers\front\pages\CompanyController::class, 'team_members'])->name('team_members');
    Route::get('testimonial', [App\Http\Controllers\front\pages\CompanyController::class, 'testimonial'])->name('testimonial');

    Route::get('quote', [App\Http\Controllers\front\pages\QuoteController::class, 'create'])->name('quote');
    Route::post('quote-store', [App\Http\Controllers\front\pages\QuoteController::class, 'store'])->name('quote.store');

    //Contact Page
    Route::get('contact', [App\Http\Controllers\front\pages\ContactController::class, 'index'])->name('contact');
    Route::post('contact-send-message', [App\Http\Controllers\front\pages\ContactController::class, 'contact_save'])->name('contact.save');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminAuthcontroller::class, 'showLoginForm'])->name('login-root');
    Route::get('/login', [App\Http\Controllers\Admin\AdminAuthcontroller::class, 'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Admin\AdminAuthcontroller::class, 'login'])->name('login.post');
    Route::post('logout', [AdminAuthcontroller::class, 'logout'])->name('logout');
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/contact', [AdminContactController::class, 'index'])->name('contact');
        Route::get('/contact-list', [AdminContactController::class, 'contact_list'])->name('contact.list');

        Route::get('/service', [ServiceController::class, 'index'])->name('service');
        Route::get('/service-list', [ServiceController::class, 'getModels'])->name('service.list');
        Route::get('/service-create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('/service-store', [ServiceController::class, 'store'])->name('service.store');
        Route::post('/service-change-status', [ServiceController::class, 'changeStatus'])->name('service.changeStatus');
        Route::get('/service-detail/{id}', [ServiceController::class, 'detail'])->name('service.detail');
        Route::get('/service-edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::put('/service-update/{id}', [ServiceController::class, 'update'])->name('service.update');
        Route::post('/service-delete', [ServiceController::class, 'destroy'])->name('service.destroy');

        Route::resource('childservices', ChildServiceController::class);
        Route::get('/child-services/{id}', [ChildServiceController::class, 'index'])->name('childservices.indexpage');
        Route::get('/childservices-list/{id}', [ChildServiceController::class, 'getModels'])->name('childservices.list');
         Route::get('/childservices/{id}/create_child',[ChildServiceController::class,'create_child'])->name('childservices.create_child');
        
    });
});


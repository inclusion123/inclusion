<?php

use Illuminate\Support\Facades\Route;

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
        return view('front.index');
    })->name('index');

    // AboutUs Pages Route 
    Route::get('about-us', [App\Http\Controllers\front\pages\AboutUsController::class, 'index'])->name('about');

    // Service Pages Route 
    Route::get('services', [App\Http\Controllers\front\pages\ServicesController::class, 'index'])->name('service');
    Route::get('mobile-development', [App\Http\Controllers\front\pages\ServicesController::class, 'mobile_development'])->name('service.mobile_development');
    Route::get('web-development', [App\Http\Controllers\front\pages\ServicesController::class, 'web_development'])->name('service.web_development');
    Route::get('game-development', [App\Http\Controllers\front\pages\ServicesController::class, 'game_development'])->name('service.game_development');
    Route::get('mvp-development', [App\Http\Controllers\front\pages\ServicesController::class, 'mvp_development'])->name('service.mvp_development');
    Route::get('hire-developers', [App\Http\Controllers\front\pages\ServicesController::class, 'hire_developers'])->name('service.hire_developers');
    Route::get('e-commerce-development', [App\Http\Controllers\front\pages\ServicesController::class, 'ecommerce_development'])->name('service.ecommerce_development');
    Route::get('cms-development', [App\Http\Controllers\front\pages\ServicesController::class, 'cms_development'])->name('service.cms_development');
    Route::get('digital-marketing', [App\Http\Controllers\front\pages\ServicesController::class, 'digital_marketing'])->name('service.digital_marketing');
    Route::get('software-testing', [App\Http\Controllers\front\pages\ServicesController::class, 'software_testing'])->name('service.software_testing');

    // Blog Pages Route
    Route::get('blogs', [App\Http\Controllers\front\pages\BlogController::class, 'blog_grid'])->name('blog_grid');
    Route::get('blog-detail', [App\Http\Controllers\front\pages\BlogController::class, 'blog_detail'])->name('blog_detail');

    //Company Pages Route
    Route::get('feature', [App\Http\Controllers\front\pages\CompanyController::class, 'feature'])->name('feature');
    Route::get('team-members', [App\Http\Controllers\front\pages\CompanyController::class, 'team_members'])->name('team_members');
    Route::get('testimonial', [App\Http\Controllers\front\pages\CompanyController::class, 'testimonial'])->name('testimonial');
    Route::get('quote', [App\Http\Controllers\front\pages\CompanyController::class, 'quote'])->name('quote');

    //Contact Page
    Route::get('contact', [App\Http\Controllers\front\pages\ContactController::class, 'index'])->name('contact');
    Route::post('contact-send-message', [App\Http\Controllers\front\pages\ContactController::class, 'contact_save'])->name('contact.save');

});


// Auth::routes();
Route::get('admin-login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class,'login']);


Route::get('register', [App\Http\Controllers\Auth\RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'register']);

Route::post('logout',  [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\Admin\AboutUsController as AdminAboutUsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminQuoteController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\ChildServiceController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Front\CareerController;
use App\Http\Controllers\Front\HomeController;

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
    Route::get('/', [HomeController::class, 'index'])->name('index');

    // AboutUs Pages Route 
    Route::get('about-us', [App\Http\Controllers\Front\AboutUsController::class, 'index'])->name('about');

    // Service Pages Route 
    Route::get('services', [App\Http\Controllers\Front\ServicesController::class, 'index'])->name('service');

    Route::get('service-detail/{slug}', [App\Http\Controllers\Front\ServicesController::class, 'service_detail']);

    // Blog Pages Route
    Route::get('blogs', [App\Http\Controllers\Front\BlogController::class, 'blog_grid'])->name('blog_grid');
    Route::get('blog-detail', [App\Http\Controllers\Front\BlogController::class, 'blog_detail'])->name('blog_detail');

    //feature page route
    Route::get('feature', [App\Http\Controllers\Front\FeatureController::class, 'index'])->name('feature');

    //Career Page Routes
    Route::name('career.')->group(function () {
        Route::get('career', [App\Http\Controllers\Front\CareerController::class, 'index'])->name('index');
        Route::post('/career', [CareerController::class, 'store'])->name('store');
        
        //job detail
        Route::get('/career/{JobDetail}',[CareerController::class,'job_detail'])->name('jobDetail');
    });

    //team member page route
    Route::get('team-members', [App\Http\Controllers\Front\TeamController::class, 'index'])->name('team_members');

    //testimonial page route
    Route::get('testimonial', [App\Http\Controllers\Front\TestimonialController::class, 'index'])->name('testimonial');

    Route::get('quote', [App\Http\Controllers\Front\QuoteController::class, 'create'])->name('quote');
    Route::post('quote-store', [App\Http\Controllers\Front\QuoteController::class, 'store'])->name('quote.store');

    //Contact Page
    Route::get('contact', [App\Http\Controllers\Front\ContactController::class, 'index'])->name('contact');
    Route::post('contact-send-message', [App\Http\Controllers\Front\ContactController::class, 'contact_save'])->name('contact.save');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [App\Http\Controllers\Admin\AdminAuthcontroller::class, 'showLoginForm'])->name('login-root')->middleware('guest');
    Route::get('/login', [App\Http\Controllers\Admin\AdminAuthcontroller::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('login', [App\Http\Controllers\Admin\AdminAuthcontroller::class, 'login'])->name('login.post');
    Route::post('logout', [AdminAuthcontroller::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::get('/contact-list', [ContactController::class, 'contact_list'])->name('contact.list');

        //service routes
        Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
            Route::get('/', [ServiceController::class, 'index'])->name('index');
            Route::get('/-list', [ServiceController::class, 'getModels'])->name('list');
            Route::get('/-create', [ServiceController::class, 'create'])->name('create');
            Route::post('/-store', [ServiceController::class, 'store'])->name('store');
            Route::post('/-change-status', [ServiceController::class, 'changeStatus'])->name('changeStatus');
            Route::get('/-detail/{id}', [ServiceController::class, 'detail'])->name('detail');
            Route::get('/-edit/{id}', [ServiceController::class, 'edit'])->name('edit');
            Route::put('/-update/{id}', [ServiceController::class, 'update'])->name('update');
            Route::post('/-delete', [ServiceController::class, 'destroy'])->name('destroy');
        });

        Route::resource('childservices', ChildServiceController::class);
        Route::get('/child-services/{id}', [ChildServiceController::class, 'index'])->name('childservices.indexpage');
        Route::get('/childservices-list/{id}', [ChildServiceController::class, 'getModels'])->name('childservices.list');
        Route::get('/childservices/{id}/create_child', [ChildServiceController::class, 'create_child'])->name('childservices.create_child');

        //quote route
        Route::get('/quote', [QuoteController::class, 'index'])->name('quote.index');
        Route::get('/quote-list', [QuoteController::class, 'getModels'])->name('quote.list');
        Route::get('/quote-destroy', [QuoteController::class, 'destroy'])->name('quote.destroy');


        //setting route
        Route::resource('settings', SettingController::class);
        Route::get('/Settings-list/', [SettingController::class, 'getModels'])->name('settings.list');

        Route::name('aboutus.')->group(function () {
            Route::get('About-Us', [AdminAboutUsController::class, 'index'])->name('index');
            Route::get('/About-US', [AdminAboutUsController::class, 'getModels'])->name('list');
            Route::delete('/About-Us/destroy/{id}', [AdminAboutUsController::class, 'destroy'])->name('destroy');
            Route::get('/About-Us/create', [AdminAboutUsController::class, 'create'])->name('create');
            Route::post('/About-Us/store', [AdminAboutUsController::class, 'store'])->name('store');
            Route::get('/About-Us/edit/{id}', [AdminAboutUsController::class, 'edit'])->name('edit');
            Route::put('About-Us/update/{id}', [AdminAboutUsController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'team', 'as' => 'team.'], function () {
            Route::get('/index', [TeamController::class, 'index'])->name('index');
            Route::get('/getModels', [TeamController::class, 'getModels'])->name('list');
            Route::get('/create', [TeamController::class, 'create'])->name('create');
            Route::post('/store', [TeamController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [TeamController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [TeamController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'career', 'as' => 'career.'], function () {
            Route::get('/applicant', [AdminCareerController::class, 'applicant_index'])->name('index');
            Route::get('/applicant-data', [AdminCareerController::class, 'applicant_data'])->name('applicant_data');
        });

        Route::group(['prefix' => 'feature', 'as' => 'feature.'], function () {
            Route::get('/', [FeatureController::class, 'index'])->name('index');
            Route::get('/-list', [FeatureController::class, 'list'])->name('list');
            // Route::get('/create',[FeatureController::class,'create'])->name('create');
            // Route::post('/store',[FeatureController::class,'store'])->name('store');
            Route::get('/edit/{id}', [FeatureController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [FeatureController::class, 'update'])->name('update');
            // Route::delete('/destroy/{id}',[FeatureController::class,'destroy'])->name('destroy');
        });

        Route::group(['prefix' => 'testimonial', 'as' => 'testimonial.'], function () {
            Route::get('/', [TestimonialController::class, 'index'])->name('index');
            Route::get('/-list', [TestimonialController::class, 'list'])->name('list');
            Route::get('/create', [TestimonialController::class, 'create'])->name('create');
            Route::post('/store', [TestimonialController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [TestimonialController::class, 'update'])->name('update');
            Route::delete('/destroy/{id}', [TestimonialController::class, 'destroy'])->name('destroy');
        });

        Route::resource('/seo', SeoController::class);
        Route::any('/seo-list', [SeoController::class, 'getModels'])->name('seo.list');

        Route::resource('/requirement', RequirementController::class);
        Route::any('/list', [RequirementController::class, 'getModels'])->name('requirement.list');

        Route::resource('/banner',BannerController::class);
        Route::get('/list', [BannerController::class, 'getModels'])->name('banner.list');
    });
});

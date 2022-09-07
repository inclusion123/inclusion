<?php

//test
use App\Http\Controllers\Admin\AboutUsController as AdminAboutUsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminQuoteController;
use App\Http\Controllers\Admin\AdminTeamController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
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
use App\Http\Controllers\Front\AboutUsController;
use App\Http\Controllers\Front\BlogController as FrontBlogController;
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

    Route::get('service/{slug}', [App\Http\Controllers\Front\ServicesController::class, 'service_detail']);

    // // Blog Pages Route
    // Route::get('blogs', [App\Http\Controllers\Front\BlogController::class, 'blog_grid'])->name('blog_grid');
    // Route::get('blog/', [App\Http\Controllers\Front\BlogController::class, 'blog_detail'])->name('blog_detail');
    // Route::post('/blog-comment', [FrontBlogController::class, 'comment'])->name('blog.comment');

    //feature page route
    Route::get('feature', [App\Http\Controllers\Front\FeatureController::class, 'index'])->name('feature');

    // Career Page Routes
    Route::group(['prefix' => 'career', 'as' => 'career.'], function () {
        Route::get('/', [App\Http\Controllers\Front\CareerController::class, 'index'])->name('index');
        Route::post('/apply-for-job', [CareerController::class, 'store'])->name('store');

        //job detail
        Route::get('/career/{slug}', [CareerController::class, 'job_detail'])->name('jobDetail');
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
    Route::get('/', [App\Http\Controllers\Admin\AdminAuthController::class, 'showLoginForm'])->name('login-root')->middleware('guest');
    Route::get('/login', [App\Http\Controllers\Admin\AdminAuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('login', [App\Http\Controllers\Admin\AdminAuthController::class, 'login'])->name('login.post');
    Route::post('logout', [App\Http\Controllers\Admin\AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

        Route::get('/contact', [ContactController::class, 'index'])->name('contact');
        Route::get('/contact-list', [ContactController::class, 'contact_list'])->name('contact.list');

        //service routes
        Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
            Route::get('/-list', [ServiceController::class, 'getModels'])->name('list');
            Route::post('/-change-status', [ServiceController::class, 'changeStatus'])->name('changeStatus');
            Route::get('/-detail/{id}', [ServiceController::class, 'detail'])->name('detail');
        });
        Route::resource('/service', ServiceController::class);

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

        Route::resource('/aboutus', AdminAboutUsController::class);
        Route::get('/about-US', [AdminAboutUsController::class, 'list'])->name('aboutus.list');

        Route::resource('/team', TeamController::class);
        Route::get('/team-list', [TeamController::class, 'list'])->name('team.list');

        Route::group(['prefix' => 'career', 'as' => 'career.'], function () {
            Route::get('/applicant', [AdminCareerController::class, 'applicant_index'])->name('index');
            Route::get('/applicant-data', [AdminCareerController::class, 'applicant_data'])->name('applicant_data');
        });

        Route::resource('/testimonial', TestimonialController::class);
        Route::get('testimonial-list', [TestimonialController::class, 'list'])->name('testimonial.list');

        Route::resource('/seo', SeoController::class);
        Route::any('/seo-list', [SeoController::class, 'list'])->name('seo.list');

        Route::resource('/requirement', RequirementController::class);
        Route::get('/requirement-list', [RequirementController::class, 'list'])->name('requirement.list');

        Route::resource('/banner', BannerController::class);
        Route::get('/banner-list', [BannerController::class, 'list'])->name('banner.list');

        Route::resource('/blog', BlogController::class);
        Route::get('/blog-list', [BlogController::class, 'list'])->name('blog.list');
    });
});

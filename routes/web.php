<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\BusRouteController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarDriverController;
use App\Http\Controllers\EventTypeController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\CityEventController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\CityCategoryController;
use App\Http\Controllers\HotelServiceController;
use App\Http\Controllers\SettingGroupController;
use App\Http\Controllers\HotelFacilityController;
use App\Http\Controllers\JobSubCategoryController;
use App\Http\Controllers\DestinationBlogController;
use App\Http\Controllers\InsuranceAgencyController;

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

Route::get('/', function () {
    return view('frontend.index');
});




Route::prefix('admin/')
    ->group(function () {

        Route::get('/', [HomeController::class, 'index'])->name('home');
        Auth::routes();

    });



Route::prefix('admin/')
    ->middleware('auth')
    ->group(function () {


        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

        Route::resource('blog-categories', BlogCategoryController::class);
        Route::resource('pages', PageController::class);
        Route::resource('faqs', FaqController::class);
        Route::resource('social-links', SocialLinkController::class);
        Route::resource('users', UserController::class);
        Route::resource('blogs', BlogController::class);

        Route::resource('buses', BusController::class);
        Route::resource('bus-routes', BusRouteController::class);

        Route::resource('cars', CarController::class);
        Route::resource('car-brands', CarBrandController::class);
        Route::resource('car-drivers', CarDriverController::class);

        Route::resource('cities', CityController::class);
        Route::resource('city-categories', CityCategoryController::class);


        Route::resource('city-events', CityEventController::class);
        Route::resource('countries', CountryController::class);

        Route::resource('destination-blogs', DestinationBlogController::class);
        Route::resource('event-types', EventTypeController::class);


        Route::resource('holidays', HolidayController::class);

        Route::resource('hotels', HotelController::class);
        Route::resource('hotel-facilities', HotelFacilityController::class);
        Route::resource('hotel-services', HotelServiceController::class);
        Route::resource('hotel-types', HotelTypeController::class);


        Route::resource('insurances', InsuranceController::class);
        Route::resource('insurance-agencies', InsuranceAgencyController::class);


        Route::resource('jobs', JobController::class);
        Route::resource('job-categories', JobCategoryController::class);
        Route::resource('job-sub-categories', JobSubCategoryController::class);


        Route::resource('settings', SettingController::class);
        Route::resource('setting-groups', SettingGroupController::class);
        Route::resource('visas', VisaController::class);

        Route::view('---settings','backend.settings');

    });

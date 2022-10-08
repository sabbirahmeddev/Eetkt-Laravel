<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\BusController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\VisaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\BusRouteController;
use App\Http\Controllers\Api\CarBrandController;
use App\Http\Controllers\Api\CarDriverController;
use App\Http\Controllers\Api\EventTypeController;
use App\Http\Controllers\Api\HotelTypeController;
use App\Http\Controllers\Api\InsuranceController;
use App\Http\Controllers\Api\SocialLinkController;
use App\Http\Controllers\Api\CityEventsController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\JobCategoryController;
use App\Http\Controllers\Api\BlogCategoryController;
use App\Http\Controllers\Api\BusBusRoutesController;
use App\Http\Controllers\Api\CarBrandCarsController;
use App\Http\Controllers\Api\CityHolidaysController;
use App\Http\Controllers\Api\CityCategoryController;
use App\Http\Controllers\Api\CountryVisasController;
use App\Http\Controllers\Api\HotelServiceController;
use App\Http\Controllers\Api\SettingGroupController;
use App\Http\Controllers\Api\CarDriverCarsController;
use App\Http\Controllers\Api\CityBusRoutesController;
use App\Http\Controllers\Api\CountryCitiesController;
use App\Http\Controllers\Api\HotelFacilityController;
use App\Http\Controllers\Api\JobSubCategoryController;
use App\Http\Controllers\Api\DestinationBlogController;
use App\Http\Controllers\Api\HotelTypeHotelsController;
use App\Http\Controllers\Api\InsuranceAgencyController;
use App\Http\Controllers\Api\JobCategoryJobsController;
use App\Http\Controllers\Api\BlogCategoryBlogsController;
use App\Http\Controllers\Api\CityAllCityEventsController;
use App\Http\Controllers\Api\CityCityCategoriesController;
use App\Http\Controllers\Api\HotelHotelServicesController;
use App\Http\Controllers\Api\JobSubCategoryJobsController;
use App\Http\Controllers\Api\CityDestinationBlogsController;
use App\Http\Controllers\Api\HotelHotelFacilitiesController;
use App\Http\Controllers\Api\SettingGroupSettingsController;
use App\Http\Controllers\Api\EventTypeAllCityEventsController;
use App\Http\Controllers\Api\InsuranceAgencyInsurancesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
        Route::apiResource('permissions', PermissionController::class);

        Route::apiResource('blog-categories', BlogCategoryController::class);

        // BlogCategory Blogs
        Route::get('/blog-categories/{blogCategory}/blogs', [
            BlogCategoryBlogsController::class,
            'index',
        ])->name('blog-categories.blogs.index');
        Route::post('/blog-categories/{blogCategory}/blogs', [
            BlogCategoryBlogsController::class,
            'store',
        ])->name('blog-categories.blogs.store');

        Route::apiResource('pages', PageController::class);

        Route::apiResource('faqs', FaqController::class);

        Route::apiResource('social-links', SocialLinkController::class);

        Route::apiResource('users', UserController::class);

        Route::apiResource('blogs', BlogController::class);

        Route::apiResource('buses', BusController::class);

        // Bus Bus Routes
        Route::get('/buses/{bus}/bus-routes', [
            BusBusRoutesController::class,
            'index',
        ])->name('buses.bus-routes.index');
        Route::post('/buses/{bus}/bus-routes', [
            BusBusRoutesController::class,
            'store',
        ])->name('buses.bus-routes.store');

        Route::apiResource('bus-routes', BusRouteController::class);

        Route::apiResource('cars', CarController::class);

        Route::apiResource('car-brands', CarBrandController::class);

        // CarBrand Cars
        Route::get('/car-brands/{carBrand}/cars', [
            CarBrandCarsController::class,
            'index',
        ])->name('car-brands.cars.index');
        Route::post('/car-brands/{carBrand}/cars', [
            CarBrandCarsController::class,
            'store',
        ])->name('car-brands.cars.store');

        Route::apiResource('car-drivers', CarDriverController::class);

        // CarDriver Cars
        Route::get('/car-drivers/{carDriver}/cars', [
            CarDriverCarsController::class,
            'index',
        ])->name('car-drivers.cars.index');
        Route::post('/car-drivers/{carDriver}/cars', [
            CarDriverCarsController::class,
            'store',
        ])->name('car-drivers.cars.store');

        Route::apiResource('cities', CityController::class);

        // City All City Events
        Route::get('/cities/{city}/all-city-events', [
            CityAllCityEventsController::class,
            'index',
        ])->name('cities.all-city-events.index');
        Route::post('/cities/{city}/all-city-events', [
            CityAllCityEventsController::class,
            'store',
        ])->name('cities.all-city-events.store');

        // City Bus Route From
        Route::get('/cities/{city}/bus-routes', [
            CityBusRoutesController::class,
            'index',
        ])->name('cities.bus-routes.index');
        Route::post('/cities/{city}/bus-routes', [
            CityBusRoutesController::class,
            'store',
        ])->name('cities.bus-routes.store');

        // City Bus Route To
        Route::get('/cities/{city}/bus-routes', [
            CityBusRoutesController::class,
            'index',
        ])->name('cities.bus-routes.index');
        Route::post('/cities/{city}/bus-routes', [
            CityBusRoutesController::class,
            'store',
        ])->name('cities.bus-routes.store');

        // City City Category
        Route::get('/cities/{city}/city-categories', [
            CityCityCategoriesController::class,
            'index',
        ])->name('cities.city-categories.index');
        Route::post('/cities/{city}/city-categories', [
            CityCityCategoriesController::class,
            'store',
        ])->name('cities.city-categories.store');

        // City Destination Blogs
        Route::get('/cities/{city}/destination-blogs', [
            CityDestinationBlogsController::class,
            'index',
        ])->name('cities.destination-blogs.index');
        Route::post('/cities/{city}/destination-blogs', [
            CityDestinationBlogsController::class,
            'store',
        ])->name('cities.destination-blogs.store');

        // City Holidays
        Route::get('/cities/{city}/holidays', [
            CityHolidaysController::class,
            'index',
        ])->name('cities.holidays.index');
        Route::post('/cities/{city}/holidays', [
            CityHolidaysController::class,
            'store',
        ])->name('cities.holidays.store');

        Route::apiResource('city-categories', CityCategoryController::class);

        Route::apiResource('all-city-events', CityEventsController::class);

        Route::apiResource('countries', CountryController::class);

        // Country Cities
        Route::get('/countries/{country}/cities', [
            CountryCitiesController::class,
            'index',
        ])->name('countries.cities.index');
        Route::post('/countries/{country}/cities', [
            CountryCitiesController::class,
            'store',
        ])->name('countries.cities.store');

        // Country Visas
        Route::get('/countries/{country}/visas', [
            CountryVisasController::class,
            'index',
        ])->name('countries.visas.index');
        Route::post('/countries/{country}/visas', [
            CountryVisasController::class,
            'store',
        ])->name('countries.visas.store');

        Route::apiResource(
            'destination-blogs',
            DestinationBlogController::class
        );

        Route::apiResource('event-types', EventTypeController::class);

        // EventType All City Events
        Route::get('/event-types/{eventType}/all-city-events', [
            EventTypeAllCityEventsController::class,
            'index',
        ])->name('event-types.all-city-events.index');
        Route::post('/event-types/{eventType}/all-city-events', [
            EventTypeAllCityEventsController::class,
            'store',
        ])->name('event-types.all-city-events.store');

        Route::apiResource('holidays', HolidayController::class);

        Route::apiResource('hotels', HotelController::class);

        // Hotel Hotel Facilities
        Route::get('/hotels/{hotel}/hotel-facilities', [
            HotelHotelFacilitiesController::class,
            'index',
        ])->name('hotels.hotel-facilities.index');
        Route::post('/hotels/{hotel}/hotel-facilities', [
            HotelHotelFacilitiesController::class,
            'store',
        ])->name('hotels.hotel-facilities.store');

        // Hotel Hotel Services
        Route::get('/hotels/{hotel}/hotel-services', [
            HotelHotelServicesController::class,
            'index',
        ])->name('hotels.hotel-services.index');
        Route::post('/hotels/{hotel}/hotel-services', [
            HotelHotelServicesController::class,
            'store',
        ])->name('hotels.hotel-services.store');

        Route::apiResource('hotel-facilities', HotelFacilityController::class);

        Route::apiResource('hotel-services', HotelServiceController::class);

        Route::apiResource('hotel-types', HotelTypeController::class);

        // HotelType Hotels
        Route::get('/hotel-types/{hotelType}/hotels', [
            HotelTypeHotelsController::class,
            'index',
        ])->name('hotel-types.hotels.index');
        Route::post('/hotel-types/{hotelType}/hotels', [
            HotelTypeHotelsController::class,
            'store',
        ])->name('hotel-types.hotels.store');

        Route::apiResource('insurances', InsuranceController::class);

        Route::apiResource(
            'insurance-agencies',
            InsuranceAgencyController::class
        );

        // InsuranceAgency Insurances
        Route::get('/insurance-agencies/{insuranceAgency}/insurances', [
            InsuranceAgencyInsurancesController::class,
            'index',
        ])->name('insurance-agencies.insurances.index');
        Route::post('/insurance-agencies/{insuranceAgency}/insurances', [
            InsuranceAgencyInsurancesController::class,
            'store',
        ])->name('insurance-agencies.insurances.store');

        Route::apiResource('jobs', JobController::class);

        Route::apiResource('job-categories', JobCategoryController::class);

        // JobCategory Jobs
        Route::get('/job-categories/{jobCategory}/jobs', [
            JobCategoryJobsController::class,
            'index',
        ])->name('job-categories.jobs.index');
        Route::post('/job-categories/{jobCategory}/jobs', [
            JobCategoryJobsController::class,
            'store',
        ])->name('job-categories.jobs.store');

        Route::apiResource(
            'job-sub-categories',
            JobSubCategoryController::class
        );

        // JobSubCategory Jobs
        Route::get('/job-sub-categories/{jobSubCategory}/jobs', [
            JobSubCategoryJobsController::class,
            'index',
        ])->name('job-sub-categories.jobs.index');
        Route::post('/job-sub-categories/{jobSubCategory}/jobs', [
            JobSubCategoryJobsController::class,
            'store',
        ])->name('job-sub-categories.jobs.store');

        Route::apiResource('settings', SettingController::class);

        Route::apiResource('setting-groups', SettingGroupController::class);

        // SettingGroup Settings
        Route::get('/setting-groups/{settingGroup}/settings', [
            SettingGroupSettingsController::class,
            'index',
        ])->name('setting-groups.settings.index');
        Route::post('/setting-groups/{settingGroup}/settings', [
            SettingGroupSettingsController::class,
            'store',
        ])->name('setting-groups.settings.store');

        Route::apiResource('visas', VisaController::class);
    });

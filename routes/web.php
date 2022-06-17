<?php
use App\Models\CmsPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BusinessSettings;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\LatestUpdatesController;
use App\Http\Controllers\Admin\MepServiceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
//To clear all cache
Route::get('cc', function () {
    Artisan::call('optimize:clear');
    return "Cleared!";
});

Auth::routes();
Route::prefix('sadmin')->namespace('Admin')->group(function () {
    Route::match(['get', 'post'], '/', [AdminController::class, 'login']);
    Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard']);
        Route::get('settings', [AdminController::class, 'settings']);
        Route::post('check-current-pwd', [AdminController::class, 'check_current_pwd']);
        Route::post('update-current-pwd', [AdminController::class, 'update_current_pwd']);
        Route::match(['get', 'post'], '/profile-update', [AdminController::class, 'profile_update']);
        Route::match(['get', 'post'], '/add-edit-other-setting/{id?}', [AdminController::class, 'addEditOtherSetting']);
        Route::get('logout',  [AdminController::class, 'logout']);

        //Banner
        Route::get('banners', [BannerController::class, 'banners'])->name('sadmin.banners');
        // Route::match(['get', 'post'], 'add-edit-banner/{id?}', [BannerController::class, 'addEditBanner'])->name('add.edit.banner');
        Route::resource('banner', '\App\Http\Controllers\Admin\BannerController')->except('index');
        Route::post('update-banner-status', [BannerController::class, 'update_banner_status']);
        //Category
		Route::get('categories', [CategoryController::class, 'categories'])->name('sadmin.categories');
		Route::resource('category', '\App\Http\Controllers\Admin\CategoryController')->except('index');
		Route::post('update-category-status', [CategoryController::class, 'update_category_status']);
        //Property
		Route::match(['get', 'post'], 'add-edit-property/{id?}', [PropertyController::class, 'addEditProperty']);
        Route::delete('delete-property/{id}', [PropertyController::class, 'deleteProperty'])->name('delete.property');
        Route::get('properties', [PropertyController::class, 'properties'])->name('sadmin.properties');
		Route::post('update-property-status', [PropertyController::class, 'update_property_status']);
        Route::match(['get', 'post'], '/add-image/{id}', [PropertyController::class, 'addImages']);
		Route::resource('property', '\App\Http\Controllers\Admin\PropertyController')->except('index');

        // LatestUpdates
		Route::resource('latestupdates','\App\Http\Controllers\Admin\LatestUpdatesController');
        Route::post('update-latestupdates-status', [LatestUpdatesController::class, 'update_latestupdates_status']);
        // Mep-Services
        Route::resource('mep-services','\App\Http\Controllers\Admin\MepServiceController');
        Route::post('update-mep-status', [MepServiceController::class, 'update_mep_status']);

        //Users
        Route::get('users', [UserController::class, 'users']);
        Route::match(['get', 'post'], 'add-edit-page/{id?}', [CmsPageController::class, 'addEditPage']);
        Route::post('update-page-status', [CmsPageController::class, 'updatePageStatus']);
        Route::delete('delete-page/{id}', [CmsPageController::class, 'deleteCmsPage']);
        //Mail Settings
        Route::match(['get', 'post'], 'mail/config', [BusinessSettings::class, 'mailConfig'])->name('mail-config');
        // CMS Page Route
        Route::get('cms-pages', [CmsPageController::class, 'cmsPages'])->name('sadmin.cms-pages');
    });
});


Route::namespace('Frontend')->group(function () {
    // Home route
    Route::get('/', [HomeController::class, 'index']);
    Route::get('banner-details/{id}', [HomeController::class, 'bannerDetails'])->name('banner.details');
    //Sitemap route
    Route::get('sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');
    Route::post('property/query', [HomeController::class, 'propertyQuery'])->name('propertyQuery');
    //Contact us
    Route::get('properties', [PageController::class, 'properties']);
    Route::get('search', [PageController::class, 'searchProperty'])->name('searchProperty');
    Route::match(['get', 'post'], 'contact', [PageController::class, 'contactUs']);
    // About us
    Route::get('about', [PageController::class, 'about_us']);
    Route::get('alamin', [PageController::class, 'alamin'])->name('alamin');
    Route::get('fullpower', [PageController::class, 'fullpower'])->name('fullpower');
    Route::get('crownvalley', [PageController::class, 'crownvalley'])->name('crownvalley');
    Route::get('trustfamous', [PageController::class, 'trustfamous'])->name('trustfamous');

        Route::get('latest/updates/view:{id}', [LatestUpdatesController::class, 'show'])->name('latest_updates');
        Route::get('view/{id}', [MepServiceController::class, 'show'])->name('latest_mep');

    //CMS Page
    $cmsSlug = CmsPage::select('slug')->where('status', 1)->get()->pluck('slug')->toArray();
    //dd($cmsSlug);
    foreach ($cmsSlug as $page_slug) {
        Route::get('/' . $page_slug, [PageController::class, 'cms_page']);
    }
    Route::get('/{slug}', [PageController::class, 'propertyDetails'])->name('propertyDetails');
});



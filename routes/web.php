<?php

use App\Http\Controllers\Backend\AchievementCategoryController;
use App\Http\Controllers\Backend\AchievementController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\PlaceController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StaticPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\TestimonController;
use App\Models\Service;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
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

Route::get('/dashboard', [HomeController::class, 'dashboard']);
Route::get('/download', [StaticPageController::class, 'download'])->name('profile.download');
Route::post('/contact-us', [HomeController::class, 'storeContactUs'])->name('storeContactUs');
Route::get('/language/{lang}', [HomeController::class, 'language'])->name('lang');
Route::post('/', [HomeController::class, 'storeServiceResquests'])->name('storeServiceResquests');
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('localization');
Auth::routes(['register' => false, 'password. request' => false, 'password. reset' => false]);

// Route::get('getUser', function ()
// {
//   return User::create(
//     [
//         'name' =>'',
//         'email'=>'',
//         'password'=>Hash::make('') 
//     ]
//   );
// });
// Route::get("clear-cache", function() {
//   Artisan::call('cache:clear');
//   Artisan::call('route:clear');
//   Artisan::call('config:clear');
//   Artisan::call('view:clear');
//   });
// Route::get("migrate", function() {
//   Artisan::call('migrate');
//   });
//   Route::get('/updateapp', function()
// {
//    exec('composer install');
//     exec('composer require doctrine/dbal');
//    exec('composer dump-autoload');
//     echo 'dump-autoload complete';
// });
Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'middleware' => 'auth'], function () {

  Route::get('/home', [HomeController::class, 'dashboard'])->name('admin.home');


  //Client
  Route::get('/clients', [ClientController::class, 'index'])->name('admin.client.index');
  Route::get('/client/datatable', [ClientController::class, 'datatable'])->name('admin.client.datatable');
  Route::get('/client/create', [ClientController::class, 'create'])->name('admin.client.create');
  Route::post('/client', [ClientController::class, 'store'])->name('admin.client.store');
  Route::get('/client/{id}/edit', [ClientController::class, 'edit'])->name('admin.client.edit');
  Route::put('/client/{id}', [ClientController::class, 'update'])->name('admin.client.update');
  Route::delete('/client/{id}', [ClientController::class, 'destroy'])->name('admin.client.destroy');
  //end Client


  //services
  Route::get('/services', [ServiceController::class, 'index'])->name('admin.service.index');
  Route::get('/service/datatable', [ServiceController::class, 'datatable'])->name('admin.service.datatable');
  Route::get('/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
  Route::post('/services', [ServiceController::class, 'store'])->name('admin.service.store');
  Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('admin.service.edit');
  Route::put('/service/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
  Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');
  Route::get('/service_requests', [ServiceController::class, 'serviceResquests'])->name('admin.service_requests.index');
  Route::get('/service_requests/datatable', [ServiceController::class, 'datatableServiceResquests'])->name('admin.service_requests.datatable');
  Route::delete('/service_requests/{id}', [ServiceController::class, 'destroyserviceResquests'])->name('admin.service_requests.destroy');
  Route::put('/service_requests/status/{service}', [ServiceController::class, 'status'])->name('admin.service_requests.status.update');
  //end services

  //Category
  Route::get('/categories', [CategoryController::class, 'index'])->name('admin.category.index');
  Route::get('/category/datatable', [CategoryController::class, 'datatable'])->name('admin.category.datatable');
  Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
  Route::post('/category', [CategoryController::class, 'store'])->name('admin.category.store');
  Route::put('/category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
  Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
  Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
  Route::put('/category/services/update', [CategoryController::class, 'updateCategoryForServices'])->name('admin.category.services.update');
  //end category

  //Achievement
  Route::get('/achievements', [AchievementController::class, 'index'])->name('admin.achievement.index');
  Route::get('/achievement/datatable', [AchievementController::class, 'datatable'])->name('admin.achievement.datatable');
  Route::get('/achievement/create', [AchievementController::class, 'create'])->name('admin.achievement.create');
  Route::post('/achievement', [AchievementController::class, 'store'])->name('admin.achievement.store');
  Route::put('/achievement/{id}', [AchievementController::class, 'update'])->name('admin.achievement.update');
  Route::get('/achievement/{id}/edit', [AchievementController::class, 'edit'])->name('admin.achievement.edit');
  Route::delete('/achievement/{id}', [AchievementController::class, 'destroy'])->name('admin.achievement.destroy');
  //end Achievement

  //Category
  Route::get('/achievement/categories', [AchievementCategoryController::class, 'index'])->name('admin.achievements.category.index');
  Route::get('achievement/category/datatable', [AchievementCategoryController::class, 'datatable'])->name('admin.achievements.category.datatable');
  Route::get('achievement/category/create', [AchievementCategoryController::class, 'create'])->name('admin.achievements.category.create');
  Route::post('achievement/category', [AchievementCategoryController::class, 'store'])->name('admin.achievements.category.store');
  Route::put('achievement/category/{id}', [AchievementCategoryController::class, 'update'])->name('admin.achievements.category.update');
  Route::get('achievement/category/{id}/edit', [AchievementCategoryController::class, 'edit'])->name('admin.achievements.category.edit');
  Route::delete('achievement/category/{id}', [AchievementCategoryController::class, 'destroy'])->name('admin.achievements.category.destroy');
  Route::put('achievement/category/services/update', [AchievementCategoryController::class, 'updateCategoryForServices'])->name('admin.achievements.category.services.update');
  //end category

  //Testimon
  Route::get('/testimonies', [TestimonController::class, 'index'])->name('admin.testimon.index');
  Route::get('/testimon/datatable', [TestimonController::class, 'datatable'])->name('admin.testimon.datatable');
  Route::get('/testimon/create', [TestimonController::class, 'create'])->name('admin.testimon.create');
  Route::post('/testimon', [TestimonController::class, 'store'])->name('admin.testimon.store');
  Route::put('/testimon/{id}', [TestimonController::class, 'update'])->name('admin.testimon.update');
  Route::get('/testimon/{id}/edit', [TestimonController::class, 'edit'])->name('admin.testimon.edit');
  Route::delete('/testimon/{id}', [TestimonController::class, 'destroy'])->name('admin.testimon.destroy');
  //end Testimon

  //contactUs
  Route::get('/contact-us', [ContactUsController::class, 'index'])->name('admin.contactUs.index');
  Route::get('/contactUs/datatable', [ContactUsController::class, 'datatable'])->name('admin.contactUs.datatable');
  Route::delete('/contact-us/{id}', [ContactUsController::class, 'destroy'])->name('admin.contactUs.destroy');
  Route::put('/contact-us/status/{contact}', [ContactUsController::class, 'status'])->name('admin.contactUs.status.update');
  //end contactUs

  //static_page
  Route::get('/static_page', [StaticPageController::class, 'index'])->name('admin.static_page.index');
  Route::post('/static_page', [StaticPageController::class, 'store'])->name('admin.static_page.store');
  Route::post('/about_company', [StaticPageController::class, 'about_company'])->name('admin.about_company.store');
  Route::post('/order', [StaticPageController::class, 'order'])->name('admin.order.store');
  Route::get('/download/{lang}', [StaticPageController::class, 'downloadFromAdminPanel'])->name('admin.profile.download');
  //end static_page

  //places
  Route::get('/places', [PlaceController::class, 'index'])->name('admin.place.index');
  Route::get('/place/datatable', [PlaceController::class, 'datatable'])->name('admin.place.datatable');
  Route::get('/place/create', [PlaceController::class, 'create'])->name('admin.place.create');
  Route::post('/places', [PlaceController::class, 'placesSmileInWorldsStore'])->name('admin.place.store');
  Route::get('/place/{id}/edit', [PlaceController::class, 'edit'])->name('admin.place.edit');
  Route::put('/place/{id}', [PlaceController::class, 'placesSmileInWorldsUpdate'])->name('admin.place.update');
  Route::delete('/place/{id}', [PlaceController::class, 'placesSmileInWorldsDestroy'])->name('admin.place.destroy');
  //end places

  //sliders
  Route::get('/sliders', [SliderController::class, 'index'])->name('admin.slider.index');
  Route::get('/slider/datatable', [SliderController::class, 'datatable'])->name('admin.slider.datatable');
  Route::get('/slider/create', [SliderController::class, 'create'])->name('admin.slider.create');
  Route::post('/sliders', [SliderController::class, 'store'])->name('admin.slider.store');
  Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('admin.slider.edit');
  Route::put('/slider/{id}', [SliderController::class, 'update'])->name('admin.slider.update');
  Route::delete('/slider/{id}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
  //end sliders

  // Route::get('create',function(){
  //    StaticPage::create([
  //               'key'=>'profile_ar',
  //               'name'=>'الملف الشخصي',
  //               'value'=>''
  //           ]);
  //           StaticPage::create([
  //               'key'=>'profile_en',
  //               'name'=>'Profile',
  //               'value'=>''
  //           ]);
  //           StaticPage::create([
  //               'key'=>'profile_tr',
  //               'name'=>'Profil',
  //               'value'=>''
  //           ]);
  // });
  //about us
  Route::get('/about-us', [StaticPageController::class, 'showAboutUs'])->name('admin.about_us.show');
  Route::post('/about-us', [StaticPageController::class, 'updateAboutUs'])->name('admin.about_us.store');
  // Route::get('about',function(){
  //   return StaticPage::where('key','profile_ar')->update([
  //     'value'=>'15992452605f528bcce3cf5.pdf'
  //   ]);
  // });
  //end about us

});

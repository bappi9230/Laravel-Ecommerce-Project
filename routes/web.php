<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware('admin:admin')->group(function(){
    Route::get('/admin/login',[AdminController::class,'LoginForm']);
    Route::post('/admin/login',[AdminController::class,'store'])->name('admin.login');
});

//////// admin all route /////////////

Route::middleware(['auth:sanctum,admin',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard')->middleware('auth:admin');
});

Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');
Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password',[AdminProfileController::class,'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/store',[AdminProfileController::class,'AdminUpdateStore'])->name('admin.update.store');






//  user admin all route //////////////
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/',[IndexController::class,'Index'])->name('home');
Route::get('/user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password',[IndexController::class,'UserChangePassword'])->name('user.change.password');
Route::post('/user/password/store',[IndexController::class,'UserPasswordStore'])->name('user.password.store');




// Admin all Brand Route

Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class,'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');

    Route::get('/edit/{id}',[BrandController::class,'BrandEdit'])->name('brand.edit');

    Route::post('/update',[BrandController::class,'BrandUpdate'])->name('brand.update');

    Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');
});

// Admin all category Route
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class,'CategoryView'])->name('all.category');

    Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');

    Route::get('/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');

    Route::post('/update',[CategoryController::class,'CategoryUpdate'])->name('category.update');

    Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');

// Admin all Sub Category route

    Route::get('/sub/view',[SubCategoryController::class,'SubCategoryView'])->name('all.subcategory');

    Route::post('/sub/store',[SubCategoryController::class,'SubCategoryStore'])->name('subcategory.store');

    Route::get('/sub/edit/{id}',[SubCategoryController::class,'SubCategoryEdit'])->name('subcategory.edit');

    Route::post('/sub/update',[SubCategoryController::class,'SubCategoryUpdate'])->name('subcategory.update');

    Route::get('/sub/delete/{id}',[SubCategoryController::class,'SubCategoryDelete'])->name('subcategory.delete');


   // Admin all sub->SubCategory route
    Route::get('/sub/sub/view',[SubCategoryController::class,'SubSubCategoryView'])->name('all.subSubcategory');
    ///sub category show
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
    ///sub sub category show
    Route::get('/subSubcategory/ajax/{subcategory_id}', [SubCategoryController::class, 'GetSubSubCategory']);

    Route::post('/sub/sub/store',[SubCategoryController::class,'SubSubCategoryStore'])->name('subSubcategory.store');

    Route::get('/sub/sub/edit/{id}',[SubCategoryController::class,'SubSubCategoryEdit'])->name('subSubcategory.edit');

    Route::post('/sub/sub/update',[SubCategoryController::class,'SubSubCategoryUpdate'])->name('subSubcategory.update');

    Route::get('/sub/sub/delete/{id}',[SubCategoryController::class,'SubSubCategoryDelete'])->name('subSubcategory.delete');
});

// Admin all Product Route

Route::prefix('product')->group(function(){
    Route::get('/add',[ProductController::class,'AddProduct'])->name('add.product');

    Route::post('/store',[ProductController::class,'ProductStore'])->name('product.store');

    Route::get('/view',[ProductController::class,'ProductView'])->name('product.view');

    Route::get('/edit/{id}',[ProductController::class,'ProductEdit'])->name('product.edit');

    Route::post('/update',[ProductController::class,'ProductUpdate'])->name('product.update');

    Route::get('/delete/image/{id}',[ProductController::class,'DeleteImage'])->name('delete.image');
    Route::post('/multi/image/update',[ProductController::class,'MultiImgUpdate'])->name('multi_image.update');


    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');

    Route::get('/delete/{id}',[ProductController::class,'ProductDelete'])->name('product.delete');
});


// Admin Slider All Routes

Route::prefix('slider')->group(function(){

    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');

    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');

    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');

    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');

    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');

    ///Active
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');
    ///inactive
    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
});




/////////////////////////////////////Frontend All route/////////////////////////////////////


///// Multiple Language Controller Route

    Route::get('language/bangla', [LanguageController::class, 'Bangla'])->name('bangla.language');
    Route::get('language/english', [LanguageController::class, 'English'])->name('english.language');

//    produc details page
    Route::get('product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

    //product tag view
    Route::get('product/tags/{tag}', [IndexController::class, 'TagWiseProductView']);

    //subcategory wise product view
    Route::get('product/subSubcategory/{id}/{slug}', [IndexController::class, 'SubSubCategoryWiseProductView']);

    //subcategory wise product view
    Route::get('product/subcategory/{id}/{slug}', [IndexController::class, 'SubCategoryWiseProductView']);

    // Product View Modal with Ajax
    Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

    // Product View Modal with Ajax
    Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

    // Product View Modal with Ajax
    Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);



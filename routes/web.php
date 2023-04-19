<?php
use Illuminate\Support\Facades\Route;

//////////////////Backend //////////////////////////
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\ReturnController;
use App\Http\Controllers\Backend\AdminUserController;



//////////////////    user    ///////////////////////
use App\Http\Controllers\user\WishListController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\User\UserAllController;
use App\Http\Controllers\User\CashPayment;
use App\Http\Controllers\User\ReviewController;



////////////////////  Frontend //////////////////////////
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CartPageController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\Frontend\ShopController;


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

// Product ADD TO CART with Ajax
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);

// Product ADD TO MINICART with Ajax
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);

// Product  REMOVE MINICART with Ajax
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// Product ADD TO WISHLIST with Ajax
Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishlist']);

Route::group(['prefix'=>'user','middleware'=>['user','auth'],'namespace'=>'User'],function (){
    // Product WISHLIST
    Route::get('/wishlist/view', [WishListController::class, 'WishlistView']);

    Route::get('/get-wishlist-product', [WishListController::class, 'GetWishlistProduct']);

    Route::get('/remove-wishlist/{id}', [WishListController::class, 'RemoveWishlistProduct']);

    Route::get('/user-order', [UserAllController::class, 'UserOrder'])->name('user.order');

    Route::get('/order/details/{order_id}', [UserAllController::class, 'UserOrderDetails']);

    ///frontend product return reason
    Route::post('/product/return/reason/{order_id}', [UserAllController::class, 'ReturnOrderReason'])->name('return.order');

    Route::get('/product/return/order/list', [UserAllController::class, 'ReturnOrderList'])->name('return.order.list');

    Route::get('/product/cancel/order/list', [UserAllController::class, 'CancelOrderList'])->name('cancel.order.list');

    /////////////order tracking route/////////////////////

    Route::post('/order/tracking', [UserAllController::class, 'OrderTracking'])->name('order.tracking');


    /////Stripe Payment///////////
    Route::post('/stripe-payment', [StripeController::class, 'StripePayment'])->name('stripe.payment');

    Route::post('/cash-payment', [CashPayment::class, 'CashOnPayment'])->name('cash.payment');

    ///PDF generate///////////

    Route::get('/pdf-generate/{order_id}', [UserAllController::class, 'PdfGenerate']);
});

////////////////////   my cart  all route //////////////////
///
Route::get('/user/mycart', [CartPageController::class, 'MyCart'])->name('mycart');

Route::get('/user/get-mycart', [CartPageController::class, 'GetMyCartProduct']);

Route::get('/user/remove-mycart/{rowId}', [CartPageController::class, 'RemoveMyCartProduct']);

Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartQtyInc']);

Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartQtyDec']);

////////////////   check out //////////////////

Route::get('/check-out', [CartController::class, 'Checkout'])->name('checkout');


/////////////////////// Admin Coupons All Routes /////////////////////////

Route::prefix('coupons')->group(function(){

    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');

    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');

    Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');

    Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');

    Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');

});

// Admin shipping Area All Routes

Route::prefix('shipping')->group(function(){

    //ship division
    Route::get('/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');

    Route::post('/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');

    Route::get('/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');

    Route::post('/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');

    Route::get('/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');

    /////////////////ship district////////////////////
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');

    Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');

    Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');

    Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');

    Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

    /////////////////   ship state   ////////////////////
    Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');

    //ajax district select route
    Route::get('/division/district/ajax/{division_id}', [ShippingAreaController::class, 'DistrictSelection']);

    Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');

    Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');
//
    Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');
//
    Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');

});

////////////// frontend coupon apply ////////////////

Route::post('/apply-coupon', [CartController::class, 'ApplyCoupon']);

Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);

Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);


////////////// frontend Checkout store///////////////////

Route::get('/shipping/division/district/ajax/{division_id}', [CheckoutController::class, 'DistrictSelection']);

Route::get('/shipping/division/sate/ajax/{district_id}', [CheckoutController::class, 'StateSelection']);

Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');



/////////////////////// Admin Pending Order All Routes /////////////////////////

Route::prefix('orders')->group(function(){

    Route::get('/pending/order', [OrderController::class, 'PendingOrders'])->name('pending-orders');

    Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');

    Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');

    Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');

    Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');

    Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');

    Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');

    Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');

    ///////////////// Order Status updated alll route /////////////////////

    Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');

    Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm-processing');

    Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing-picked');

    Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked-shipped');

    Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped-delivered');

    Route::get('/delivered/cancel/{order_id}', [OrderController::class, 'DeliveredToCancel'])->name('delivered-cancel');

    Route::get('/invoice/{order_id}', [OrderController::class, 'PdfGenerate'])->name('order-invoice');


});


//////////////backend all report route

Route::prefix('reports')->group(function (){
    Route::get('/view', [ReportController::class, 'ReportView'])->name('all.reports');

    Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');

    Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');

    Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');

});//////////////backend all report route

Route::prefix('alluser')->group(function (){
    Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all.users');
});


// Admin Reports Routes
Route::prefix('blog')->group(function(){

    Route::get('/category', [BlogController::class, 'BlogCategory'])->name('blog.category');

    Route::post('/store', [BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');

    Route::get('/category/edit/{id}', [BlogController::class, 'BlogCategoryEdit'])->name('blog.category.edit');

    Route::post('/update', [BlogController::class, 'BlogCategoryUpdate'])->name('blogcategory.update');

    Route::get('/delete/{post_id}', [BlogController::class, 'BlogCategoryDelete'])->name('blog.category.delete');

    // Admin View Blog Post Routes

    Route::get('/view/post', [BlogController::class, 'ViewBlogPost'])->name('view.post');

    Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list.post');

    Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add.post');

    Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post-store');

    Route::get('/post/edit/{post_id}', [BlogController::class, 'BlogPostEdit'])->name('blog.post.edit');

    Route::post('/post/update/{post_id}', [BlogController::class, 'BlogPostUpdate'])->name('blog.post.update');

    Route::get('/post/delete/{post_id}', [BlogController::class, 'BlogPostDelete'])->name('blog.post.delete');

});

//  Frontend Blog Show Routes

Route::get('/blog', [HomeBlogController::class, 'AddBlogPost'])->name('home.blog');

Route::get('/post/details/{id}', [HomeBlogController::class, 'DetailsBlogPost'])->name('post.details');

Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'HomeBlogCatPost']);


// Admin Site Setting Routes
Route::prefix('setting')->group(function(){

    Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');

    Route::post('/site/update/{setting_id}', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.site.setting');

    Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');

    Route::post('/seo/update/{seo_id}', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seo.setting');


});

// Admin Return Order Routes
Route::prefix('return')->group(function(){

    Route::get('/admin/request', [ReturnController::class, 'ReturnRequest'])->name('return.request');

    Route::get('/admin/return/approve/{order_id}', [ReturnController::class, 'ReturnRequestApprove'])->name('return.approve');

    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');

});

// Review all route
Route::post('/review/store/{product_id}', [ReviewController::class, 'ReviewStore'])->name('review.store');

// Admin Manage Review Routes
Route::prefix('review')->group(function(){

    Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');

    Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');

    Route::get('/admin/all/request', [ReturnController::class, 'ReturnAllRequest'])->name('all.request');

    Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');

    Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');

});

// Admin Manage Review Routes
Route::prefix('stock')->group(function(){

    Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');


});


// Admin User Role Routes
Route::prefix('adminuserrole')->group(function(){

    Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');

    Route::get('/add', [AdminUserController::class, 'AddAdminRole'])->name('add.admin.user');

    Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');

    Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');

    Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');

    Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');

});

Route::post('/search', [IndexController::class, 'ProductSearch'])->name('product.search');

// Advance Search Routes
Route::post('search-product', [IndexController::class, 'SearchProduct']);


//////////////////shop Page Route //////////////////////

Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');

Route::post('/shop/filter', [ShopController::class, 'ShopFilter'])->name('shop.filter');

Route::get('/shop/brand/{brand_id}', [ShopController::class, 'ShopBrand'])->name('brand.page');


















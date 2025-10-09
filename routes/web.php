<?php

use App\Http\Controllers\Auth\LoginController as AuthLoginController;
use App\Http\Controllers\Auth\RegisterController as AuthRegisterController;
use App\Http\Controllers\Customer\ResetPasswordController;
use App\Http\Controllers\Customer\ForgotPasswordController;
use App\Http\Controllers\Customer\VerificationController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\frontend\BaseController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\Customer\LoginController;
use App\Http\Controllers\Customer\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\frontend\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BaseController::class, 'homePage'])->name('index');
Route::get('/about', [BaseController::class, 'about'])->name('about');
Route::get('/contact', [BaseController::class, 'contact'])->name('contact');
Route::get('/cart', [BaseController::class, 'cart'])->name('cart');
Route::get('/error-404', [BaseController::class, 'error'])->name('error');
Route::get('/blogs-page', [BaseController::class, 'blogs'])->name('blogs');
Route::get('/blog-details', [BaseController::class, 'blogDetails'])->name('blog.details');
Route::get('/login', [BaseController::class, 'login'])->name('login');
Route::get('/products', [BaseController::class, 'products'])->name('products');
Route::get('/product-details/{id}/{slug?}', [BaseController::class, 'productDetails'])->name('product.details');
Route::get('/quickview/product/{id}', [BaseController::class, 'quickView'])->name('product.details.quickview');
Route::get('/wishlist', [BaseController::class, 'wishlist'])->name('wishlist');
Route::post('/add-to-cart', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart-remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart-update', [CartController::class, 'update'])->name('cart.update');
Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/district', [BaseController::class, 'getDistrict'])->name('get.district');
Route::post('/upazila', [BaseController::class, 'getUpazila'])->name('get.upazila');
Route::get('/search-products', [SearchController::class, 'search'])->name('products.search');


Route::prefix('customer')->name('customer.')->group(function (){
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/create', [RegisterController::class, 'register'])->name('create');
    Route::get('verify/{token}', [VerificationController::class, 'verify'])->name('verify');

    Route::middleware('auth:customer')->group(function() {


    Route::get('/dashboard', [CustomerController::class, 'index'])->name('dashboard');
    Route::get('/cancel-orders', [CustomerController::class, 'cancelOrders'])->name('cancel.orders');
    Route::post('/order-cancel/{id}', [CustomerController::class, 'orderCancel'])->name('order.cancel');
    Route::get('/completed-orders', [CustomerController::class, 'completedOrders'])->name('completed.orders');
    Route::get('/pending-orders', [CustomerController::class, 'pendingOrders'])->name('pending.orders');
    Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
    Route::get('/edit/profile', [CustomerController::class, 'editProfileShow'])->name('profile.edit');
    Route::put('/update/profile', [CustomerController::class, 'updateProfile'])->name('profile.update');
    Route::get('/address/edit/{id}', [CustomerController::class, 'editAddressShow'])->name('address.edit');
    Route::put('/address/update/{id}', [CustomerController::class, 'updateAddress'])->name('address.update');
    Route::get('/address/create', [CustomerController::class, 'createAddressShow'])->name('address.create');
    Route::post('/address/create/store', [CustomerController::class, 'addressStore'])->name('address.store');
    Route::get('/address/create/delete/{id}', [CustomerController::class, 'addressDelete'])->name('address.delete');
    Route::post('order/details', [CustomerController::class, 'OrderDetails'])->name('order.details');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('forgot.password');
    Route::post('/forgot-password/link', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::Post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('/change-password/show', [CustomerController::class, 'changePasswordShow'])->name('change.password.show');
    Route::post('/change-password', [CustomerController::class, 'changePassword'])->name('change.password');

    });
});






//Admin Pannel
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
// Slider Route
Route::get('/slider/create', [SliderController::class,'create'])->name('slider.create');
Route::post('/slider/store', [SliderController::class,'store'])->name('slider.store');
Route::get('/slider/manage', [SliderController::class,'sliderIndex'])->name('slider.index');
Route::get('/slider/edit/{id}', [SliderController::class,'edit'])->name('slider.edit');
Route::post('/slider/update/{id}', [SliderController::class,'update'])->name('slider.update');
Route::get('/slider/delete/{id}', [SliderController::class,'destroy'])->name('slider.delete');
Route::get('/slider/status/{id}', [SliderController::class,'changeStatus'])->name('slider.status');
//Category Route
Route::get('/category/create', [CategoryController::class,'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class,'store'])->name('category.store');
Route::get('/category/manage', [CategoryController::class,'categoryIndex'])->name('category.index');
Route::get('/category/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
Route::post('/category/update/{id}', [CategoryController::class,'update'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class,'destroy'])->name('category.delete');
Route::get('/category/status/{id}', [CategoryController::class,'changeStatus'])->name('category.status');
//Brand Route
Route::get('/brand/create', [BrandController::class,'create'])->name('brand.create');
Route::post('/brand/store', [BrandController::class,'store'])->name('brand.store');
Route::get('/brand/manage', [BrandController::class,'brandIndex'])->name('brand.index');
Route::get('/brand/edit/{id}', [BrandController::class,'edit'])->name('brand.edit');
Route::post('/brand/update/{id}', [BrandController::class,'update'])->name('brand.update');
Route::get('/brand/delete/{id}', [BrandController::class,'destroy'])->name('brand.delete');
Route::get('/brand/status/{id}', [BrandController::class,'changeStatus'])->name('brand.status');
//Products Route
Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
Route::post('/product/store', [ProductController::class,'store'])->name('product.store');
Route::get('/product/manage', [ProductController::class,'productIndex'])->name('product.index');
Route::get('/product/{status}', [ProductController::class,'status'])->name('products.view');
Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{id}', [ProductController::class,'update'])->name('product.update');
Route::get('/product/delete/{id}', [ProductController::class,'destroy'])->name('product.delete');
// Route::get('/admin/product/image/delete/{id}/{index}', [ProductController::class,'deleteImage'])->name('product.image.delete');
Route::post('/product/image/delete', [ProductController::class,'deleteImage'])->name('product.image.delete');
Route::get('/product/status/{id}', [ProductController::class,'changeStatus'])->name('product.status');
//Order Route
Route::get('/orders-manage', [OrderController::class, 'orders'])->name('orders.manage');
Route::get('/order-details/{id}', [OrderController::class, 'details'])->name('order.details');
Route::get('/orders/{status}', [OrderController::class, 'status'])->name('order.status');
Route::get('/invoice', [OrderController::class, 'invoice'])->name('order.invoice');

//Admin Order Status Function handle For Dashboard
Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('order.cancel');
Route::post('/orders/{id}/confirmed', [OrderController::class, 'confirmed'])->name('order.confirmed');
Route::post('/orders/{id}/shipped', [OrderController::class, 'shipped'])->name('order.shipped');
Route::post('/orders/{id}/deliverd', [OrderController::class, 'deliverd'])->name('order.deliverd');
//Order Search Route
Route::get('/search-order', [OrderController::class, 'searchOrder'])->name('order.search');
//Login, Logout Route
Route::get('/register', [AuthRegisterController::class, 'registerShow'])->name('register');
Route::get('/login', [AuthLoginController::class, 'loginShow'])->name('login');
Route::post('/login/submit', [AuthLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthLoginController::class, 'logout'])->name('logout');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

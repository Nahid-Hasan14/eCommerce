<?php

use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\frontend\BaseController;
use App\Http\Controllers\frontend\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BaseController::class, 'index'])->name('index');
Route::get('/about', [BaseController::class, 'about'])->name('about');
Route::get('/contact', [BaseController::class, 'contact'])->name('contact');
Route::get('/checkout', [BaseController::class, 'checkout'])->name('checkout');
Route::get('/cart', [BaseController::class, 'cart'])->name('cart');
Route::get('/error-404', [BaseController::class, 'error'])->name('error');
Route::get('/blogs-page', [BaseController::class, 'blogs'])->name('blogs');
Route::get('/blog-details', [BaseController::class, 'blogDetails'])->name('blog.details');
Route::get('/register', [BaseController::class, 'register'])->name('register');
Route::get('/login', [BaseController::class, 'login'])->name('login');
Route::get('/dashboard', [BaseController::class, 'dashboard'])->name('dashboard');
Route::get('/products', [BaseController::class, 'products'])->name('products');
Route::get('/product-details', [BaseController::class, 'productDetails'])->name('product.details');
Route::get('/wishlist', [BaseController::class, 'wishlist'])->name('wishlist');
Route::post('/add-to-cart', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart-remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart-update', [CartController::class, 'update'])->name('cart.update');
Route::post('/address', [CartController::class, 'address'])->name('checkout.address');












//Admin Pannel
Route::get('/home', function () {
    return view('backend.index');
});

Route::get('/admin/slider/create', [SliderController::class,'create'])->name('slider.create');
Route::post('/admin/slider/store', [SliderController::class,'store'])->name('slider.store');
Route::get('/admin/slider/manage', [SliderController::class,'index'])->name('slider.index');
Route::get('/admin/slider/edit/{id}', [SliderController::class,'edit'])->name('slider.edit');
Route::post('/admin/slider/update/{id}', [SliderController::class,'update'])->name('slider.update');
Route::get('/admin/slider/delete/{id}', [SliderController::class,'destroy'])->name('slider.delete');
Route::get('/admin/slider/status/{id}', [SliderController::class,'changeStatus'])->name('slider.status');

Route::get('/admin/category/create', [CategoryController::class,'create'])->name('category.create');
Route::post('/admin/category/store', [CategoryController::class,'store'])->name('category.store');
Route::get('/admin/category/manage', [CategoryController::class,'index'])->name('category.index');
Route::get('/admin/category/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
Route::post('/admin/category/update/{id}', [CategoryController::class,'update'])->name('category.update');
Route::get('/admin/category/delete/{id}', [CategoryController::class,'destroy'])->name('category.delete');
Route::get('/admin/category/status/{id}', [CategoryController::class,'changeStatus'])->name('category.status');

Route::get('/admin/brand/create', [BrandController::class,'create'])->name('brand.create');
Route::post('/admin/brand/store', [BrandController::class,'store'])->name('brand.store');
Route::get('/admin/brand/manage', [BrandController::class,'index'])->name('brand.index');
Route::get('/admin/brand/edit/{id}', [BrandController::class,'edit'])->name('brand.edit');
Route::post('/admin/brand/update/{id}', [BrandController::class,'update'])->name('brand.update');
Route::get('/admin/brand/delete/{id}', [BrandController::class,'destroy'])->name('brand.delete');
Route::get('/admin/brand/status/{id}', [BrandController::class,'changeStatus'])->name('brand.status');

Route::get('/admin/product/create', [ProductController::class,'create'])->name('product.create');
Route::post('/admin/product/store', [ProductController::class,'store'])->name('product.store');
Route::get('/admin/product/manage', [ProductController::class,'index'])->name('product.index');
Route::get('/admin/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
Route::post('/admin/product/update/{id}', [ProductController::class,'update'])->name('product.update');
Route::get('/admin/product/delete/{id}', [ProductController::class,'destroy'])->name('product.delete');
// Route::get('/admin/product/image/delete/{id}/{index}', [ProductController::class,'deleteImage'])->name('product.image.delete');
Route::post('/admin/product/image/delete', [ProductController::class,'deleteImage'])->name('product.image.delete');
Route::get('/admin/product/status/{id}', [ProductController::class,'changeStatus'])->name('product.status');

Route::get('/admin/orders-manage', [OrderController::class, 'orders'])->name('orders.manage');






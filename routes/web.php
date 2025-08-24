<?php

use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\frontend\BaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BaseController::class, 'index'])->name('index');

Route::get('/home', function () {
    return view('backend.index');
});

Route::get('/admin/slider/create', [SliderController::class,'create'])->name('slider.create');
Route::post('/admin/slider/store', [SliderController::class,'store'])->name('slider.store');
Route::get('/admin/slider/manage', [SliderController::class,'index'])->name('slider.index');
Route::get('/admin/slider/edit/{id}', [SliderController::class,'edit'])->name('slider.edit');
Route::post('/admin/slider/update/{id}', [SliderController::class,'update'])->name('slider.update');
Route::get('/admin/slider/delete/{id}', [SliderController::class,'destroy'])->name('slider.delete');


Route::get('/admin/category/create', [CategoryController::class,'create'])->name('category.create');
Route::post('/admin/category/store', [CategoryController::class,'store'])->name('category.store');
Route::get('/admin/category/manage', [CategoryController::class,'index'])->name('category.index');
Route::get('/admin/category/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
Route::post('/admin/category/update/{id}', [CategoryController::class,'update'])->name('category.update');
Route::get('/admin/category/delete/{id}', [CategoryController::class,'destroy'])->name('category.delete');


Route::get('/admin/brand/create', [BrandController::class,'create'])->name('brand.create');
Route::post('/admin/brand/store', [BrandController::class,'store'])->name('brand.store');
Route::get('/admin/brand/manage', [BrandController::class,'index'])->name('brand.index');
Route::get('/admin/brand/edit/{id}', [BrandController::class,'edit'])->name('brand.edit');
Route::post('/admin/brand/update/{id}', [BrandController::class,'update'])->name('brand.update');
Route::get('/admin/brand/delete/{id}', [BrandController::class,'destroy'])->name('brand.delete');



Route::get('/admin/product/create', [ProductController::class,'create'])->name('product.create');
Route::post('/admin/product/store', [ProductController::class,'store'])->name('product.store');
Route::get('/admin/product/manage', [ProductController::class,'index'])->name('product.index');
Route::get('/admin/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
Route::post('/admin/product/update/{id}', [ProductController::class,'update'])->name('product.update');
Route::get('/admin/product/delete/{id}', [ProductController::class,'destroy'])->name('product.delete');
Route::get('/admin/product/status/{id}', [ProductController::class,'changeStatus'])->name('product.status');





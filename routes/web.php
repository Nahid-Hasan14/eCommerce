<?php

use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.index');
});

Route::get('/admin/slider/create', [SliderController::class,'create'])->name('slider.create');
Route::post('/admin/slider/store', [SliderController::class,'store'])->name('slider.store');
Route::get('/admin/slider/manage', [SliderController::class,'index'])->name('slider.index');
Route::get('/admin/slider/edit/{id}', [SliderController::class,'edit'])->name('slider.edit');
Route::post('/admin/slider/update/{id}', [SliderController::class,'update'])->name('slider.update');
Route::get('/admin/slider/delete/{id}', [SliderController::class,'destroy'])->name('slider.delete');


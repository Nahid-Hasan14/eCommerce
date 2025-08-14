<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.index');
});
Route::get('/forms', function () {
    return view('backend.forms.forms');
})->name('backend.forms');

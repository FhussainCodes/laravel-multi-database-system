<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicFormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dynamic-form', [DynamicFormController::class, 'showForm'])->name('show.form');
Route::post('/dynamic-form', [DynamicFormController::class, 'storeData'])->name('store.form');

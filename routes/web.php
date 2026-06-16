<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicFormController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dynamic-form', [DynamicFormController::class, 'showForm'])->name('form.show');
Route::post('/dynamic-form', [DynamicFormController::class, 'storeData'])->name('form.store');
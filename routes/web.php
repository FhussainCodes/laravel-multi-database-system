<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DynamicFormController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DynamicFormController::class, 'showForm'])->name('show.form');
Route::post('/', [DynamicFormController::class, 'storeData'])->name('store.form');

Route::get('/display-users', [DynamicFormController::class, 'displayUsers'])->name('display.users');
Route::post('/update-password/{id}', [DynamicFormController::class, 'updatePassword'])->name('update.password');
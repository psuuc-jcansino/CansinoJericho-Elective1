<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalInfoController;

Route::get('/personal-info', [PersonalInfoController::class, 'showForm'])->name('personal-info.form');

Route::post('/personal-info', [PersonalInfoController::class, 'submitForm'])->name('personal-info.submit');

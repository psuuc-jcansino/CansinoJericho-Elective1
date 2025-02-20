<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperationController; // para sa pag-import ng controller

// defualt route (home page)
Route::get('/', function () {
    return "Welcome! Use the URL to compute values.";
});

// route para sa dalawang operations galing sa URL
Route::get('/{operation1}/{num1}/{num2}/{operation2}/{num3}/{num4}', [OperationController::class, 'calculate']);

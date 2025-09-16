<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController; // importing the controller

Route::get('/', function () {
    return view('welcome');
});

Route::get('/plants', [PlantController::class, 'index']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

Route::get('/', [FoodController::class, 'index']);
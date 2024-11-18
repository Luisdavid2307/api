<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculosController;

Route::apiResource('/vehiculos', VehiculosController::class);

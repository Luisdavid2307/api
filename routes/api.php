<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;

Route::apiResource('/vehiculos', VehiculoController::class);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route as Routes;
use App\Http\Controllers\VehiculoController;

Routes::get('/vehiculos',[VehiculoController::class, 'index']);
Routes::post('/vehiculos',[VehiculoController::class, 'store']);
Routes::get('/vehiculos/{id}',[VehiculoController::class, 'show']);
Routes::put('/vehiculos/{id}',[VehiculoController::class, 'update']);
Routes::delete('/vehiculos/{id}',[VehiculoController::class, 'destroy']);


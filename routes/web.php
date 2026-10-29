<?php

use App\Http\Controllers\DrivesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/drives', [DrivesController::class, 'index']);

Route::get('/drives/create', [DrivesController::class, 'create']);

Route::post('/drives', [DrivesController::class, 'store']);

Route::get('/drives/{id}', [DrivesController::class, 'show']);

Route::get('/drives/{id}/edit', [DrivesController::class, 'edit']);

Route::put('/drives/{id}', [DrivesController::class, 'update']);

Route::delete('/drives/{id}', [DrivesController::class, 'destroy']);

Route::get('/about', function () {
    return view('about');
});

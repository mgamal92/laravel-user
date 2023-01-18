<?php

use Illuminate\Support\Facades\Route;
use MG\User\Controllers\UsersController;


Route::get('users/{id}/activity-logs', [UsersController::class, 'activityLog']);
Route::post('users/{id}/block', [UsersController::class, 'block']);
Route::apiResource('users', UsersController::class);
<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\ProfileController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\WorkspaceController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::post('register', RegisterController::class);
    Route::post('login', [LoginController::class, 'login']);
    Route::post('refresh-token', [LoginController::class, 'refreshToken']);
});

//authenticate api endpoint
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get('/user', ProfileController::class);
    Route::apiResource('projects', ProjectController::class);
    Route::get('/members', [MemberController::class, 'index']);
    Route::get('/workspaces', [WorkspaceController::class, 'index']);
});

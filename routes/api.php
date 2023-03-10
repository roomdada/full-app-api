<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\StatsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->group(function () {
    // recuperation de l'utilisateur connecté
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('courses', [CourseController::class, 'store']);
    Route::get('stats', StatsController::class);
    Route::get('user/courses', [CourseController::class, 'userCourses']);
});

Route::apiResource('courses', CourseController::class)->except('store');
Route::apiResource('categories', CategoryController::class);
Route::get('recents/categories', [CategoryController::class, 'recents']);
Route::get('popular/courses', [CourseController::class, 'popular']);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
});

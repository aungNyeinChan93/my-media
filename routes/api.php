<?php

use App\Http\Controllers\Api\ActionLogsController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// auth test
Route::get('test', function () {
    return 'test ';
});

// Auth
Route::post('users/register', [AuthController::class, 'register']);
Route::post('users/login', [AuthController::class, 'login']);
Route::post('users/logout', [AuthController::class, 'logout'])->middleware("auth:sanctum");

// posts
Route::get('posts', [PostController::class, 'index']);
Route::post('posts/search', [PostController::class, 'search']);
Route::get('posts/detail/{post}', [PostController::class, 'detail']);

// Category
Route::get('categories', [CategoryController::class, 'index']);
Route::post('categories/search', [CategoryController::class, 'search']);

// ActionLogs
Route::post('actionLogs/post/view', [ActionLogsController::class, 'view']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlbumController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('addnew', [UserController::class, 'store']);
Route::put('usersupdate/{id}', [UserController::class, 'update']);
Route::delete('usersdelete/{id}', [UserController::class, 'destroy']);

Route::get('albums', [AlbumController::class, 'index']);
Route::get('albums/{id}', [AlbumController::class, 'show']);
Route::post('albums/addnew', [AlbumController::class, 'store']);
Route::put('albumsupdate/{id}', [AlbumController::class, 'update']);
Route::delete('albumsdelete/{id}', [AlbumController::class, 'destroy']);

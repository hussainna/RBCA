<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RoleController;
use \App\Http\Controllers\PermissionController;
use \App\Http\Controllers\UserController;
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
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('admin')->group(function () {

    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index']);
        Route::get('/{id}', [RoleController::class, 'show']);
        Route::post('/', [RoleController::class, 'store']);
        Route::post('/update/{id}', [RoleController::class, 'update']);
        Route::post('/delete/{id}', [RoleController::class, 'destroy']);
        Route::post('/activity/{id}', [RoleController::class, 'getAuditLogs']);
        Route::post('/integrate-with-permission/{id}', [RoleController::class, 'integrateWithPermission']);
        Route::post('/revoke-with-permission/{id}', [RoleController::class, 'revokePermission']);

    });

    Route::prefix('permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index']);
        Route::get('/{id}', [PermissionController::class, 'show']);
        Route::post('/', [PermissionController::class, 'store']);
        Route::post('/update/{id}', [PermissionController::class, 'update']);
        Route::get('/delete/{id}', [PermissionController::class, 'destroy']);
        Route::post('/activity/{id}', [PermissionController::class, 'getAuditLogs']);
    });

    Route::prefix('users')->group(function () {
        Route::post('/', [UserController::class, 'store']);
        Route::post('/assign-to-role/{id}', [UserController::class, 'assignRole']);
        Route::post('/revoke-to-role/{id}', [UserController::class, 'revokeRole']);
    });



});

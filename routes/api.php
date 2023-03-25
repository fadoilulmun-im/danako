<?php

use App\Http\Controllers\API\AuthUserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CampaignController;
use App\Http\Controllers\API\DonationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::prefix('auth-user')->group(function () {
    Route::post('register', [AuthUserController::class, 'register']);
    Route::post('login', [AuthUserController::class, 'login']);
});

Route::group(['prefix' => 'master'], function () {
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/list', [CategoryController::class, 'list'])->name('api.master.categories.list');
        Route::get('/', [CategoryController::class, 'index'])->name('api.master.categories.index');
        Route::post('/', [CategoryController::class, 'store'])->name('api.master.categories.store');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('api.master.categories.show');
        Route::post('/{id}', [CategoryController::class, 'update'])->name('api.master.categories.update');
        Route::delete('/{id}', [CategoryController::class, 'delete'])->name('api.master.categories.delete');
    });
    Route::group(['prefix' => 'campaigns'], function () {
        Route::get('/', [CampaignController::class, 'index'])->name('api.master.campaigns.index');
    });
    Route::group(['prefix' => 'donations'], function () {
        Route::get('/', [DonationController::class, 'index'])->name('api.master.donations.index');
    });
});

Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me', [AuthenticationController::class, 'me'])->middleware(['auth:sanctum']);

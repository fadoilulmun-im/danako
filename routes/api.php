<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CampaignController;
use App\Http\Controllers\API\DonationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
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
        Route::post('/', [CampaignController::class, 'store'])->name('api.master.campaigns.store');
        Route::get('/category-list', [CampaignController::class, 'categoryList'])->name('api.master.campaigns.category.list');
        Route::get('/user-list', [CampaignController::class, 'userList'])->name('api.master.campaigns.user.list');
        Route::get('/{id}', [CampaignController::class, 'show'])->name('api.master.campaigns.show');
        Route::put('/{id}', [CampaignController::class, 'update'])->name('api.master.campaigns.update');
        Route::delete('/{id}', [CampaignController::class, 'delete'])->name('api.master.campaigns.delete');
    });
    Route::group(['prefix' => 'donations'], function () {
        Route::get('/', [DonationController::class, 'index'])->name('api.master.donations.index');
    });
});
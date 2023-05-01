<?php

use App\Http\Controllers\API\AuthUserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CampaignController;
use App\Http\Controllers\API\DonationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\UserController;

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

Route::prefix('list-location')->group(function () {
    Route::get('province', [LocationController::class, 'listProvince'])->name('api.province.list');
    Route::get('regency', [LocationController::class, 'listRegency'])->name('api.regency.list');
    Route::get('subdistrict', [LocationController::class, 'listSubDistrict'])->name('api.subdistrict.list');
    Route::get('village', [LocationController::class, 'listVillage'])->name('api.village.list');
});

Route::prefix('auth-user')->group(function () {
    Route::post('/', [AuthUserController::class, 'update'])->name('api.user.update')->middleware(['auth:sanctum']);
    Route::get('/me', [AuthUserController::class, 'me'])->name('api.me')->middleware(['auth:sanctum']);
    Route::get('/detail', [AuthUserController::class, 'userDetail'])->name('api.user.detail')->middleware(['auth:sanctum']);
    Route::post('register', [AuthUserController::class, 'register'])->name('api.user.register');
    Route::post('login', [AuthUserController::class, 'login'])->name('api.user.login');
    Route::get('logout', [AuthUserController::class, 'logout'])->name('api.user.logout')->middleware(['auth:sanctum']);
});

//user authentication

//API route for register user
// Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register'])->name('api.user.register');
//API route for login user
// Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('api.user.login');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function (Request $request) {
        return auth()->user();
    });

    // API route for logout user
    // Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout'])->name('api.user.logout');
});
//end user authentication

Route::prefix('auth-admin')->group(function () {
    Route::post('/', [AuthenticationController::class, 'update'])->name('api.admin.update')->middleware(['auth:sanctum']);
    Route::post('/change-password', [AuthenticationController::class, 'changePassword'])->name('api.admin.changePassword')->middleware(['auth:sanctum']);
    Route::post('/login', [AuthenticationController::class, 'login'])->name('api.admin.login');
    Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum'])->name('api.admin.logout');
    Route::get('/me', [AuthenticationController::class, 'me'])->name('api.admin.me')->middleware(['auth:sanctum']);
    Route::post('/upload-image', [AuthenticationController::class, 'uploadImage'])->name('api.admin.uploadImage')->middleware(['auth:sanctum']);
});

Route::group(['prefix' => 'master'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/list', [UserController::class, 'list'])->name('api.master.users.list');
        Route::put('/{id}/change-status', [UserController::class, 'changeStatus'])->name('api.master.users.changeStatus')->middleware(['auth:sanctum']);
        Route::put('/{id}/reset-password', [UserController::class, 'resetPassword'])->name('api.master.users.resetPassword')->middleware(['auth:sanctum']);
        Route::get('/', [UserController::class, 'index'])->name('api.master.users.index')->middleware(['auth:sanctum']);
        Route::post('/', [UserController::class, 'store'])->name('api.master.users.store')->middleware(['auth:sanctum']);
        Route::get('/{id}', [UserController::class, 'show'])->name('api.master.users.show');
        Route::put('/{id}/verif', [UserController::class, 'updateVerifiying'])->name('api.master.users.verif')->middleware(['auth:sanctum']);
    });
    
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/list', [CategoryController::class, 'list'])->name('api.master.categories.list');
        Route::get('/', [CategoryController::class, 'index'])->name('api.master.categories.index')->middleware(['auth:sanctum']);
        Route::post('/', [CategoryController::class, 'store'])->name('api.master.categories.store')->middleware(['auth:sanctum']);
        Route::get('/{id}', [CategoryController::class, 'show'])->name('api.master.categories.show');
        Route::post('/{id}', [CategoryController::class, 'update'])->name('api.master.categories.update')->middleware(['auth:sanctum']);
        Route::delete('/{id}', [CategoryController::class, 'delete'])->name('api.master.categories.delete')->middleware(['auth:sanctum']);
    });
    Route::group(['prefix' => 'campaigns'], function () {
        Route::get('/pagination', [CampaignController::class, 'pagination'])->name('api.master.campaigns.pagination');
        Route::get('/list', [CampaignController::class, 'list'])->name('api.master.campaigns.list');
        Route::post('/store', [CampaignController::class, 'storeUser'])->name('api.campaigns.storeUser')->middleware(['auth:sanctum']);
        Route::get('/', [CampaignController::class, 'index'])->name('api.master.campaigns.index');
        Route::post('/', [CampaignController::class, 'store'])->name('api.master.campaigns.store');
        Route::get('/{id}', [CampaignController::class, 'show'])->name('api.master.campaigns.show');
        Route::post('/{id}', [CampaignController::class, 'update'])->name('api.master.campaigns.update');
        Route::delete('/{id}', [CampaignController::class, 'delete'])->name('api.master.campaigns.delete');
        Route::put('/verif/{id}', [CampaignController::class, 'updateVerifiying'])->name('api.master.campaigns.verif')->middleware(['auth:sanctum']);
    });
    Route::group(['prefix' => 'donations'], function () {
        Route::get('/', [DonationController::class, 'index'])->name('api.master.donations.index');
        Route::post('/', [DonationController::class, 'store'])->name('api.master.donations.store');
        Route::get('/{id}', [DonationController::class, 'show'])->name('api.master.donations.show');
        Route::post('/{id}', [DonationController::class, 'update'])->name('api.master.donations.update');
        Route::delete('/{id}', [DonationController::class, 'delete'])->name('api.master.donations.delete');
    });
});
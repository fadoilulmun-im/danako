<?php

use App\Http\Controllers\WEB\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/verification-email/{id}', [VerifyEmailController::class, 'verify'])->name('verification.verify');

Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', function () {
        return view('admin.page.login');
    })->name('admin.login');

    Route::get('/', function () {
        return view('admin.page.index');
    })->name('admin.dashboard');

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/users', function () {
        return view('admin.page.master.user');
    });

    Route::get('/categories', function () {
        return view('admin.page.master.category');
    });

    Route::get('/campaigns', function () {
        return view('admin.page.master.campaign');
    });
    
    Route::get('/donations', function () {
        return view('admin.page.master.donation');
    });
});

Route::get('/landing', function () {
    return view('landing.index');
});

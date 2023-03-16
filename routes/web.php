<?php

use Illuminate\Support\Facades\Route;

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
<<<<<<< HEAD
    return view('admin.page.index');
=======
    return view('welcome');
>>>>>>> 6dea91e6c7a2160a9d1a8b56c087f94100108fc4
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.page.index');
    });
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/categories', function () {
        return view('admin.page.master.category');
    });
});
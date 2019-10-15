<?php

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

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Show todos page
    Route::get('/', 'Todos\TodoController')->name('index');
});

Route::middleware('guest')->group(function () {
    // Show login form
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('auth.show_login_form');
});


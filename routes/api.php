<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Sort todos
    Route::put('/todos/reorder', 'Todos\TodoController@reorder');
    // CRUD for todos
    Route::apiResource('/todos', 'Todos\TodoController');

    // Logout
    Route::post('/logout', 'Auth\LoginController@logout')->name('auth.logout');

    // Get currently authenticated user
    Route::get('/user', 'Users\UserController@getAuthenticatedUser');
});

Route::middleware(['guest'])->group(function () {

    // Login
    Route::post('/login', 'Auth\LoginController@login')->name('auth.login');

});

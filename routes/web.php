<?php

/**
 * Part Login
 */
Route::auth();

/**
 * Part Admin
 */
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth.admin'])->group(function () {

    Route::get('/', 'DashboardController@dashboard');
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::resources([
        'categories' => 'CategoryController',
        'blogs' => 'BlogController'
    ]);
});

Route::post('test', function () {
    return 'oj';
});
Route::get('logout', function () {
    dd(auth()->guard());
});
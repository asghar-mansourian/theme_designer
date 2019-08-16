<?php

/**
 * Part Login
 */
Route::auth();

/**
 * Part Admin
 */
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth.admin:admin'])->group(function () {

    Route::get('/', 'DashboardController@dashboard');
    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
});

Route::get('test', function () {
    dd(auth()->user()->isAdmin());
});
Route::get('logout', function () {
    dd(auth()->guard());
});
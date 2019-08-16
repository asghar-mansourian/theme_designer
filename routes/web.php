<?php

/**
 * Part Login
 */
Route::auth();

/**
 * Part Admin
 */
Route::prefix('admin')->namespace('Admin')->name('admin.')->middleware(['auth.admin'])->group(function () {

    Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');
});
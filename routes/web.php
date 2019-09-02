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
    Route::prefix('ajax')->name('ajax.')->group(function () {
        // load categories
        Route::get('categories/{parent_id?}', 'AjaxController@categories')->name('categories');
    });
    Route::resources([
        'categories' => 'CategoryController',
        'blogs' => 'BlogController'
    ]);
});

Route::get('test', function () {
    return get_all_category_positions();
});
Route::get('logout', function () {
    dd(auth()->guard());
});
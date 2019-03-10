<?php

Route::group(['namespace' => 'KeepInMind', 'prefix' => 'keep-in-mind'], function () {
    Route::apiResources([
        'categories' => 'CategoriesController',
        'records' => 'RecordsController'
    ]);

    Route::get('category-by-path/{path}', 'CategoriesController@getByPath')->where('path', '.*');

//    Route::middleware(['guest:api'])->group(function () {

//        Route::post('signin', 'AuthController@signin');
//    });
//    Route::middleware(['auth:api'])->group(function () {
//        Route::post('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
//    });
});


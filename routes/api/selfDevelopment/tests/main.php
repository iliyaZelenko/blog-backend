<?php

//Route::group(['namespace' => 'Tests', 'prefix' => 'tests'], function () {
Route::apiResources([
    'categories' => 'CategoriesController'
]);

//Route::get('category-children/{category}', 'CategoriesController@getChildren');
Route::get('get-by-path', 'CategoriesController@getByPath');



//    Route::middleware(['guest:api'])->group(function () {

//        Route::post('signin', 'AuthController@signin');
//    });
//    Route::middleware(['auth:api'])->group(function () {
//        Route::post('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
//    });
//});


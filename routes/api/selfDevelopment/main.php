<?php

//Route::group(['namespace' => 'SelfDevelopment', 'prefix' => 'sd'], function () {
require __DIR__ . './tests/main.php';
require __DIR__ . './keepInMind/main.php';

Route::apiResources([
    'scopes' => 'ScopesController'
]);

//    Route::middleware(['guest:api'])->group(function () {

//        Route::post('signin', 'AuthController@signin');
//    });
//    Route::middleware(['auth:api'])->group(function () {
//        Route::post('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
//    });
//});


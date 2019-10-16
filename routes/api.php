<?php

Route::group([


    'prefix' => 'auth',
    'namespace' => 'Api'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});






Route::group(['prefix' => 'V1', 'namespace' => 'Api'], function () {
    Route::resource('/users', 'UserController');
});

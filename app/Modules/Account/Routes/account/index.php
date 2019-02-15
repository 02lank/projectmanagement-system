<?php
Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'AccountController@index');
        Route::post('/', 'AccountController@store');
    }
);

Route::group([

    // 'middleware' => 'api',
    'prefix' => 'auth'
], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
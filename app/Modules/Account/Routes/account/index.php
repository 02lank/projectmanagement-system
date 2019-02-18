<?php
Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('/', 'AccountController@index');
        Route::post('/', 'AccountController@store');
    }
);


Route::post('login', 'AccountController@authenticate');
Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
Route::get('user', 'AuthController@getAuthenticatedUser');
Route::get('closed', 'DataController@closed');
});
Route::group([

    // 'middleware' => 'api',
    'prefix' => 'auth'
], function () {

    //Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

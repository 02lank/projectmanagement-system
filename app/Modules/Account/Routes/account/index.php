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

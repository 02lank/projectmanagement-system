<?php
Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('/', 'AccountController@index');
        Route::get('user', 'AuthController@getAuthenticatedUser');
        Route::get('closed', 'DataController@closed');
    }
);


Route::post('/', 'AccountController@store');
Route::post('login', 'AccountController@authenticate');
Route::get('open', 'DataController@open');



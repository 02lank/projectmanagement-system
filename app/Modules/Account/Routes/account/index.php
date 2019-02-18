<?php
Route::group(['middleware' => ['jwt.verify']], function () {
        Route::get('/', 'AccountController@index');
        Route::post('/', 'AccountController@store');
        Route::get('user', 'AuthController@getAuthenticatedUser');
        Route::get('closed', 'DataController@closed');
    }
);


Route::post('login', 'AccountController@authenticate');
Route::get('open', 'DataController@open');



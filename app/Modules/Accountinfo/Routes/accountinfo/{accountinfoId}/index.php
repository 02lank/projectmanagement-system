<?php
Route::group(
    ['middleware' => ['jwt.verify']], function () {
        //Route::get('/', 'AccountInfoController@show');
        Route::put('/', 'AccountInfoController@update');
        Route::delete('/', 'AccountInfoController@destroy');
        Route::get('/', 'AccountInfoController@getAuthenticatedUser');
    }
);
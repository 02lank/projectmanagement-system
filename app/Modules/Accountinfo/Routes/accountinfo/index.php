<?php
Route::group(
    ['middleware' => ['jwt.verify']], function () {
        Route::get('/', 'AccountInfoController@index');     
    }
);
Route::post('/', 'AccountInfoController@store');

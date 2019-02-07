<?php
Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'AccountInfoController@index');
        Route::post('/', 'AccountInfoController@store');
    }
);

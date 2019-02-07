<?php
Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'AccountController@index');
        Route::post('/', 'AccountController@store');
    }
);

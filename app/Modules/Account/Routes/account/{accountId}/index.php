<?php
Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'AccountController@show');
        Route::put('/', 'AccountController@update');
        Route::delete('/', 'AccountController@destroy');
    }
);
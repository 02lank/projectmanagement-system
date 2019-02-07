<?php
Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'AccountInfoController@show');
        Route::put('/', 'AccountInfoController@update');
        Route::delete('/', 'AccountInfoController@destroy');
    }
);
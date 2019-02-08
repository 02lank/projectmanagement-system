<?php
Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'TeamController@show');
        Route::put('/', 'TeamController@update');
        Route::delete('/', 'TeamController@destroy');
    }
);
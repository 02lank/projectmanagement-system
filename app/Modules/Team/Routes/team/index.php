<?php
Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'TeamController@index');
        Route::post('/', 'TeamController@store');
    }
);
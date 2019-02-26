<?php
Route::group(
    ['middleware' => ['jwt.verify']], function () {
        Route::get('/', 'TeamController@index');
        Route::post('/', 'TeamController@store');
    }
);
<?php
Route::group(
    ['middleware' => ['jwt.verify']], function () {
        Route::get('/', 'ProjectController@index');
        Route::post('/', 'ProjectController@store');
    }
);
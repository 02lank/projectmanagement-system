<?php
Route::group(
    ['middleware' => ['jwt.verify']], function () {
        Route::get('/', 'ProjectController@show');
        Route::put('/', 'ProjectController@update');
        Route::delete('/', 'ProjectController@destroy');
    }
);
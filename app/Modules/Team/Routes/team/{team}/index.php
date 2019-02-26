<?php
Route::group(
    ['middleware' => ['jwt.verify']], function () {
        Route::get('/', 'TeamController@show');
        Route::put('/', 'TeamController@update');
        Route::delete('/', 'TeamController@destroy');
    }
);
<?php

Route::group(
    ['middleware' => ['jwt.verify']], function () {
        Route::get('/', 'TaskController@index');
        Route::get('/user', 'TaskController@indexUser');
        Route::post('/', 'TaskController@store');
    }
);

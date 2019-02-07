<?php

Route::group(
    ['middleware' => []], function () {
        Route::get('/', 'TaskController@index');
        Route::get('/user', 'TaskController@indexUser');
        Route::post('/', 'TaskController@store');
    }
);

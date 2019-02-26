<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function(){
    return [
        "APP_NAME" => 'Test'
    ];
});
Route::post('register', 'AccountController@store');
Route::post('login', 'AuthController@login');
Route::get('open', 'DataController@open');

Route::group(['middleware' => ['jwt.verify']], function() {
Route::get('user', 'AuthController@getAuthenticatedUser');
Route::get('closed', 'DataController@closed');
});

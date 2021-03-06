<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'CompareController@index');
Route::post('/compare', 'CompareController@compare');

Route::group(['prefix' => '/api/v1'], function () {
        Route::get('user/repositories/{user}', 'ApiController@userRepositories');
        Route::get('user/{user}', 'ApiController@getUser');
        Route::get('repository/{user}/{name}', 'ApiController@getRepository');
});        
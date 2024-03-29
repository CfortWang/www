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
Route::group(['namespace' => 'Api'], function() {
    Route::get('location', 'LocationController@list');
    Route::post('join', 'JoinController@create');
    Route::post('join/send_sms', 'JoinController@send_sms');
    Route::post('join/check_id', 'JoinController@check_id');
    Route::post('join/check_recommender', 'JoinController@check_recommender');

    Route::post('worldcup', 'WcController@create');
}); 
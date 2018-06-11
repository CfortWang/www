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

Route::group(['namespace' => 'Web'], function() {
    Route::get('/', 'MainController@index')->name("www_main");
    Route::get('product.html', 'ProductController@index')->name("www_product");
    Route::get('introduction.html', 'IntroductionController@index')->name("www_introduction");
    Route::get('career.html', 'CareerController@index')->name("www_career");
});

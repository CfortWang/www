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
    Route::get('product', 'ProductController@index')->name("www_product");
    Route::get('introduction', 'IntroductionController@index')->name("www_introduction");
    Route::get('career', 'CareerController@index')->name("www_career");
    Route::get('join', 'JoinController@index')->name("www_join");
    Route::get('joinTerm', 'JoinController@term')->name("www_join_term");
    Route::get('joinPayment', 'JoinController@payment')->name("www_join_payment");
    
    
    //China pay
    Route::get('UnionPay','UnionPayController@UnionPay');
    Route::post('UnionPayReturn','UnionPayController@UnionPayReturn');
    Route::post('UnionPayNotity','UnionPayController@UnionPayNotity');
    
    // Alipay
    Route::get('AliPay','AliPayController@AliPay');
    Route::post('AliPayNotify','AliPayController@AliPayNotify');
    Route::any('AliPayReturn','AliPayController@AliPayReturn');
    
    Route::get('unionPayFailed','UnionPayController@unionPayFailed');
    Route::get('UnionUndo','UnionPayController@undo');
    Route::get('download/spapp','DownloadController@spapp');

    //Terms
    Route::get('userProtocol','TermController@protocol');
    Route::get('userguide','TermController@guide');
    //wc
    Route::get('worldcup2018','WcController@index');
    Route::get('worldcupresult','WcController@result');
});

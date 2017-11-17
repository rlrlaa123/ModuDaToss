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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//일반 영업사원
Route::resource('SalesInfo','SalesController');
Route::get('/mypage', 'SalesController@mypage');
Route::get('/profit', 'SalesController@profit');
Route::get('/Recommender', 'SalesController@Recommender');

//파트너
Route::resource('Partner','PartnerController');






Route::get('/admin', 'testcontroller@index');

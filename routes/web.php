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
Route::get('/mypage/{id}', 'SalesController@mypage');
Route::get('/profit/{id}', 'SalesController@profit');
Route::get('/Recommender/{id}', 'SalesController@Recommender');
Route::get('/withdrawal/{id}' ,'SalesController@withdrawal');
Route::post('/withdrawal/{id}' ,'SalesController@withdrawalrequest');
//파트너
Route::resource('Partner','PartnerController');
Route::get('/Partner/{Category}/{SalesPerson_id}','PartnerController@show3');

//test
Route::post('/test','PartnerController@show2');




Route::get('/admin', 'testcontroller@index');

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


Route::resource('/show','MemberController');
//회원들 개인 페이지
Route::get('/show/{type}/{userid}','MemberController@Memberdetail');

//영업 정보
Route::get('/show2','SIController@index');
Route::get('/show2/detail/{id}','SIController@show');
Route::get('/show2/{state}','SIController@Categorize');
//상품
Route::resource('/category','CategoryController');
//인출
Route::resource('/withdrawal','WithdrawalController');
Route::get('/excel/{place}','WithdrawalController@exceltest');

//게시판
Route::resource('article', 'ArticlesController');
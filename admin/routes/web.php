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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index');


Route::resource('member','MemberController');
//회원들 개인 페이지
Route::get('/member/detail/{userid}','MemberController@Memberdetail');
//A 클래스 회원 추가 페이지
Route::get('/member/a_class/create','MemberController@CreateAClass');
//A 클래스 회원 추가
Route::get('/member/a_class/create/{userid}','MemberController@UpdateAClass');

//영업 정보
Route::get('/SIshow','SIController@index');
Route::get('/SIshow/detail/{id}','SIController@show');
Route::get('/SIshow/{state}','SIController@Categorize');
Route::post('/Grant','SIController@Grant');
Route::get('/Reject','SIController@Reject');

//상품
Route::resource('/category','CategoryController');

//인출
Route::resource('/withdrawal','WithdrawalController');
Route::get('/ExcelDownload/{place}/{Extension}','WithdrawalController@ExcelDownload');

//게시판
Route::resource('articles', 'ArticlesController');

// 댓글
Route::resource('comments', 'CommentsController', ['only' => ['update', 'destroy']]);
Route::resource('articles.comments', 'CommentsController', ['only' => 'store']);

// 기타관리
Route::get('/etc','Etc\EtcController@index');
Route::get('/etc/front/edit','Etc\FrontController@edit');
Route::put('/etc/front/update','Etc\FrontController@update');
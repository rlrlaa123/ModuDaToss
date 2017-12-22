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

Route::get('/', [
    'as' => '/',
    'uses' => 'HomeController@index',
]);

// 사용자 가입
Route::get('auth/register', [
    'as' => 'users.create',
    'uses' => 'UsersController@create'
]);

Route::post('auth/register', [
    'as' => 'users.store',
    'uses' => 'UsersController@store'
]);

Route::get('auth/confirm/{code}', [
    'as' => 'users.confirm',
    'uses' => 'UsersController@confirm',
])->where('code', '[\pL-\pN]{60}');

/* 사용자 인증 */
Route::get('auth/login', [
    'as' => 'sessions.create',
    'uses' => 'SessionsController@create',
]);
Route::post('auth/login', [
    'as' => 'sessions.store',
    'uses' => 'SessionsController@store',
]);
Route::get('auth/logout', [
    'as' => 'sessions.destroy',
    'uses' => 'SessionsController@destroy',
]);

/* 비밀번호 초기화 */
Route::get('auth/remind', [
    'as' => 'remind.create',
    'uses' => 'PasswordsController@getRemind',
]);
Route::post('auth/remind', [
    'as' => 'remind.store',
    'uses' => 'PasswordsController@postRemind',
]);
Route::get('auth/reset/{token}', [
    'as' => 'reset.create',
    'uses' => 'PasswordsController@getReset',
])->where('token', '[\pL-\pN]{64}');
Route::post('auth/reset', [
    'as' => 'reset.store',
    'uses' => 'PasswordsController@postReset',
]);

//일반 영업사원
Route::resource('SalesInfo','SalesController');
Route::get('/SalesInfoall','SalesController@showall');
Route::get('/SalesInfoall/{state}','SalesController@showstateall');
Route::get('Choosecategory',[
  'as' => 'SalesInfo.choosecategory',
  'uses' => 'SalesController@Choosecategory'
]);

// 정회원 등록
Route::get('regular/{id}',[
    'as'=> 'regular.create',
    'uses'=>'RegularMemberController@create'
]);
Route::post('/regular/{id}',[
    'as'=> 'regular.store',
    'uses'=>'RegularMemberController@store'
]);

Route::get('/mypage/{id}', 'SalesController@mypage');
Route::get('/mypage/{id}/edit',[
    'as' => 'mypage.edit',
    'uses' => 'SalesController@mypageedit'
]);
Route::post('/mypage/{id}/update', [
    'as' => 'mypage.update',
    'uses' => 'SalesController@mypageupdate'
]);
Route::get('/profit/{id}', 'SalesController@profit');
Route::get('/profitdetail/{id}/','SalesController@profitdetail');
Route::get('/Recommender/{id}', 'SalesController@Recommender');
Route::get('/Recommenderdetail/{id}/{recommendeeid}','SalesController@Recommenderdetail');
Route::get('/withdrawal/{id}' ,'SalesController@withdrawal');
Route::get('/WithdrawalLog/{id}','SalesController@WithdrawalLog');
Route::get('/DepositLog/{id}','SalesController@DepositLog');
Route::post('/withdrawal/{id}' ,'SalesController@withdrawalrequest');
Route::get('/SalesInfo/{id}/{state}','SalesController@showstate');
Route::get('/detail/{SIid}','SalesController@showdetail');


//파트너
Route::resource('Partner','PartnerController');
Route::get('/Partner/{Category}/{state}','PartnerController@showbystate');
Route::get('/Partner/detail/{Category}/{SalesPerson_id}','PartnerController@show3');

//test
Route::post('/test','PartnerController@show2');

// 게시판
Route::resource('articles','ArticlesController');

// 댓글
Route::resource('comments', 'CommentsController', ['only' => ['update', 'destroy']]);
Route::resource('articles.comments', 'CommentsController', ['only' => 'store']);

//고객센터
Route::get('/servicecenter/{notice}','ServiceCenterController@index');
Route::get('/servicecenter/{notice}/{id}', 'ServiceCenterController@show');

Route::get('/servicecenter/{frequently}','ServiceCenterController@index');
Route::get('/servicecenter/{frequently}/{id}', 'ServiceCenterController@show');

//영업 라인업
Route::get('/category/{id}', 'CategoryController@show');

Route::get('social/{provider}', [
    'as' => 'social.login',
    'uses' => 'SocialController@execute',
]);

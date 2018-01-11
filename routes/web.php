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

//일반 영업사원 SalesController

Route::get('/SalesInfo','SalesController@show');
Route::get('/SalesInfo/create','SalesController@create');
Route::post('/SalesInfo',[
  'as' => 'SalesInfo.store',
  'uses' => 'SalesController@store',
]);

Route::get('/My','SalesController@SIshow');
Route::get('/All','SalesController@showall');
Route::get('/detail/{SIid}','SalesController@showdetail');
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

// 회원 개인페이지 MemberController
Route::get('/mypage', 'MemberController@mypage');
Route::get('/mypage/edit',[
    'as' => 'mypage.edit',
    'uses' => 'MemberController@mypageedit'
]);
Route::post('/mypage/update', [
    'as' => 'mypage.update',
    'uses' => 'MemberController@mypageupdate'
]);
Route::get('/profit', 'MemberController@profit');
Route::get('/Recommender', 'MemberController@Recommender');
Route::get('/withdrawal' ,'MemberController@withdrawal');
Route::get('/WithdrawalLog','MemberController@WithdrawalLog');
Route::get('/DepositLog','MemberController@DepositLog');
Route::post('/withdrawal' ,'MemberController@withdrawalrequest');
Route::get('/Recommenders','MemberController@Recommenders');
Route::get('/recomfetch/{userid}','MemberController@recomfetch');



//파트너
Route::get('/Partner','PartnerController@show');
Route::get('/Partner/SIshow','PartnerController@SIshow');
Route::get('/Partner/detail/{id}','PartnerController@showdetail');
Route::post('/Partner/update','PartnerController@update');

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

Route::get('/dashboard/{id}', function() {

    $articles = \App\Article::latest()->paginate(5);

    return view('dashboards.index',compact('articles'));
});

Route::prefix('dashboard/{dashboard}')->group(function() {
// 게시판
    Route::resource('articles','ArticlesController');

// 댓글
    Route::resource('comments', 'CommentsController', ['only' => ['update', 'destroy']]);
    Route::resource('articles.comments', 'CommentsController', ['only' => 'store']);
});

//Route::prefix('dashboard/{dashboard}')->group(function () {
//    Route::resource('article', 'ArticleController');
//});

// 메일
Route::get('mail/completed',[
    'as' => 'mail.completed',
    'uses' => 'MailController@salesCompleted'
]);

Event::listen('sales.completed', function($category,$sales_id){
    $vendors = \App\User::where('category',$category)->get();
    $SalesInfo = \App\SalesInfo::find($sales_id);

    \Illuminate\Support\Facades\Mail::send('emails.completed',['SalesInfo'=>$SalesInfo],function($message) use ($vendors,$SalesInfo){
        for($i=0; $i<count($vendors);$i++)
        {
            $message->to($vendors[$i]->email)->subject('[모두다던져] 모두다던져 알림입니다.');
        }
    });

    $front_img = \App\Etc::find(1);
    return view('home',compact('front_img'));
});

Event::listen('sales.proceed', function($SalesPerson_id,$sales_id){
    $SalesInfo = \App\SalesInfo::find($sales_id);
    $SalesPerson = \App\User::find($SalesPerson_id);
    \Illuminate\Support\Facades\Mail::send('emails.proceed',['SalesInfo'=>$SalesInfo], function($message) use ($SalesPerson,$SalesInfo) {
        $message->to($SalesPerson->email)->subject('[모두다던져] 모두다던져 알림입니다.');
    });
});

Route::get('hello', function() {
    return view('emails.proceed');
});
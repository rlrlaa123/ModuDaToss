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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['domain' => config('API_DOMAIN'), 'namespace' => 'Api', 'as' => 'api.'], function() {
    Route::group([
    ], function(){
        /* 환영 메시지 */
        Route::get('/', [
            'uses' => 'HomeController@index',
        ]);
        /* 카테고리 */
        Route::get('/category/{id}','CategoryController@show');
    });
});
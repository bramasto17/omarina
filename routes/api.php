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

/*api route for admin setting*/
Route::group(['middleware' => 'SessionAuth'], function () {
	Route::post('MenuSettingRes/upload','MenuSettingController@upload');
	Route::resource('MenuSettingRes','MenuSettingController',
		array("only"=>array('index','store','show','update','destroy')));
	Route::resource('TransactionSetting','TransactionSettingController',
		array("only"=>array('index','store','show','update','edit','destroy')));
	Route::resource('AccountSetting','AccountSettingController',
		array("only"=>array('update')));
});

Route::post('Auth/login','AuthController@Login');  
Route::get('Auth/logout','AuthController@Logout');


/*api route for public website*/
Route::resource('Product','ProductController',
	array("only"=>array('index')));

Route::resource('Confirmation','ConfirmationController',
	array("only"=>array('store')));

Route::resource('News','NewsController',
	array("only"=>array('index','store','update','destroy')));

Route::post('Order/SaveTransaction','OrderController@SaveTransaction');
Route::post('Order/SaveDetailTransaction','OrderController@SaveDetailTransaction');


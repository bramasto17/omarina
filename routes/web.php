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
    return view('Home\index');
})->name('home');

Route::get('product',function(){
	return view('Product\index');
})->name('product');

Route::get('detail',function(){
	return view('Product\detail');
})->name('detail');

Route::get('faq',function(){
	return view('Faq\index');
});

Route::get('about',function(){
	return view('About\index');
})->name('about');

Route::get('news',function(){
	return view('News\index');
})->name('news');

Route::get('cart',function(){
	return view('Cart\index');
})->name('cart');

Route::get('order',function(){
	return view('Order\index');
});

Route::get('confirmation',function(){
	return view('Confirmation\index');
})->name('confirmation');



//admin route
Route::get('admin',function(){
	return view('Admin\login');
});

Route::group(['middleware' => 'SessionAuth'], function () {
	Route::get('admin/AccountSetting',function(){
		return view('Admin\AccountSetting\index');
	});
	Route::get('admin/MenuSetting',function(){
		return view('Admin\MenuSetting\index');
	});
	Route::get('admin/TransactionSetting',function(){
		return view('Admin\TransactionSetting\index');
	});
	Route::get('admin/NewsSetting',function(){
		return view('Admin\NewsSetting\index');
	});        
});





// CATCH ALL ROUTE =============================  
// all routes that are not home or api will be redirected to the frontend 
// this allows angular to route them 
// Route::any('{catchall}', function() {
//   return view('home');
// })->where('catchall', '.*');

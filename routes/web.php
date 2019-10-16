<?php


Route::get('/', 'WelcomeController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



//Route::get('{path}',"HomeController@index")->where('path','([A-z\d-\/_.]+)?' );
Route::get('{path}', 'HomeController@index')->where('path', '([A-z]+)?');

/**Categories_route**/
Route::resource('category', 'CategoryController');
Route::get('category-show', 'CategoryController@index');
Route::put('category-update/{id}', 'CategoryController@update');


//  brand Routes
Route::resource('brand', 'BrandController');
Route::get('brands-show', 'BrandController@index');
Route::put('brands-update/{id}', 'BrandController@update');
Route::get('search-bar', 'BrandController@Search');

/**Product Routes */
Route::post('product', 'ProductController@saveProduct');
Route::get('data-sent', 'ProductController@index');
Route::get('product-show', 'ProductController@showProduct');
Route::delete('delete/{id}', 'ProductController@DeleteProduct');
Route::put('updateProduct/{id}', 'ProductController@UpdateProduct');

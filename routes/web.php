<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


//Route::get('{path}',"HomeController@index")->where('path','([A-z\d-\/_.]+)?' );
Route::get('{path}','HomeController@index')->where( 'path', '([A-z]+)?' );


Route::resource('category','CategoryController');
Route::get('category-show','CategoryController@index');
Route::put('category-update/{id}','CategoryController@update');


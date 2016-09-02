<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'ProductController@index');

Route::get('product', 'ProductController@index');

//Route
Route::pattern('categorySlug', '(.*)');
Route::pattern('titleSlug', '(.*)');
Route::get('/{categorySlug}/{titleSlug}', 'ProductController@show');
Route::get('/{categorySlug}', 'ProductController@listCategoryProducts');
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
Auth::routes();

Route::get('/', 'PagesController@home');
Route::get('/categories/{id}', 'PagesController@categories')->name('categories');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::get('/article/{id}', 'PagesController@article')->name('article');

Route::post('/comments/{article}', 'CommentsController@store')->name('comments.store');
Route::delete('/comments/{comment}', 'CommentsController@destroy')->name('comments.destroy');
	
Route::get('/notification/{notification}', 'NotificationController@destroy')->name('notification');
Route::post('/sendMail', 'NotificationController@sendMail')->name('sendMail');

Route::resource('articles', 'ArticlesController');

Route::get('filter/','FiltersController@filter')->name('filter');

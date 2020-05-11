<?php

use Illuminate\Support\Facades\Route;

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

// FrontEnd
Route::get('/', 'Web\FrontController@index')->name('index');
Route::get('/articles', 'Web\FrontController@index')->name('index');
Route::get('/about', 'Web\FrontController@about')->name('about');
Route::get('/contact', 'Web\FrontController@contact')->name('contact');
Route::get('/articles/{article}', 'Web\FrontController@show')->name('article.detail');
Route::get('/articles/categori/{categori}', 'Web\FrontController@article_categori')->name('article.categori');

Auth::routes();

// BackEnd
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categori', 'CategoriController');
    Route::resource('article', 'ArticleController');
});

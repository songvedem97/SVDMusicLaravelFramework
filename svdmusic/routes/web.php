<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','HomeController@index')->name('home.index');
Route::get('/404','HomeController@error404')->name('home.404');
Route::get('/500','HomeController@error500')->name('home.500');
Route::get('/user','HomeController@user')->name('home.user');
Route::get('/bxh','HomeController@bxh')->name('home.bxh');
Route::get('/newsong','HomeController@newsong')->name('home.newsong');
Route::get('/artist','HomeController@artist')->name('home.artist');
Route::get('/category','HomeController@category')->name('home.category');
Route::get('/top100','HomeController@top100')->name('home.top100');
Route::get('/{id}/{slug}.html','HomeController@view')->name('view');

// Đăng nhập admin
Route::get('admin/login','AdminController@login')->name('login');
Route::post('admin/login','AdminController@post_login')->name('login');

//Nếu muốn vào route bên dưới thì phải vượt qua middleware   
Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
    Route::get('/','AdminController@dashboard')->name('dashboard');
    Route::get('/logout','AdminController@logout')->name('logout');
});

Route::group(['prefix'=>'admin' ],function(){
    Route::resources([
        'ablum'=>'AblumController',
        'user'=>'UserController',
        'area'=>'AreaController',
        'artist'=>'ArtistController',
        'banner'=>'BannerController',
        'category'=>'CategoryController',
        'mv'=>'MvController',
        'playlist'=>'PlaylistController',
        'song'=>'SongController',
        'top100'=>'Top100Controller',
    ]);
});
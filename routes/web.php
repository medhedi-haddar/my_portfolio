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

Route::get('/', 'controller@index' );
Route::get('/accueil', function (){
    return view('front.index');
});

Route::resource('admin/portfolio', 'PortfolioController')->middleware('auth');
Route::resource('admin/works', 'WorkController')->middleware('auth');
Route::resource('admin/album', 'AlbumController')->middleware('auth');
Route::resource('admin/imagesalbum', 'ImagesAlbum')->middleware('auth');



Route::post('admin/album/images/upload', 'GeneralController@imagesUploadAlbum')->name('images.upload')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

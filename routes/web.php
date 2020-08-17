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
/*
Frontend
*/

Route::prefix('admin')->group(function () {
    Route::prefix('category')->group(function () {
        Route::get('/', [
            'as'=>'categories.index',
            'uses'=>'CategoryController@index'
            ]);
        Route::get('/create', [
            'as'=>'categories.create',
            'uses'=>'CategoryController@create'
             ]);
        Route::post('/store', [
            'as'=>'categories.store',
            'uses'=>'CategoryController@store'
             ]);
        Route::get('/{id}/edit', [
            'as'=>'categories.edit',
            'uses'=>'CategoryController@edit'
             ]);
        Route::post('/{id}/update', [
            'as'=>'categories.update',
            'uses'=>'CategoryController@update'
             ]);
        Route::get('/{id}/delete', [
            'as'=>'categories.delete',
            'uses'=>'CategoryController@destroy'
             ]);
    });
    Route::prefix('menu')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses'=> 'MenuController@index'
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'MenuController@create'
        ]);
        Route::post('/store', [
            'as'=> 'menus.store',
            'uses' => 'MenuController@store'
        ]);
        Route::get('/{id}/edit', [
            'as' => 'menus.edit',
            'uses'=> 'MenuController@edit'
        ]);
        Route::post('/{id}/update', [
            'as' => 'menus.update',
            'uses'=> 'MenuController@update'
        ]);
        Route::get('/{id}/delete', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@destroy'
        ]);
    });
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses'=> 'ProductController@index'
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'ProductController@create'
        ]);
        Route::post('/store', [
            'as'=> 'product.store',
            'uses' => 'ProductController@store'
        ]);
        Route::get('/{id}/edit', [
            'as' => 'product.edit',
            'uses'=> 'ProductController@edit'
        ]);
        Route::post('/{id}/update', [
            'as' => 'product.update',
            'uses'=> 'ProductController@update'
        ]);
        Route::get('/{id}/delete', [
            'as' => 'product.delete',
            'uses' => 'ProductController@destroy'
        ]);
    });
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as'=>'slider.index',
            'uses'=>'SliderController@index'
            ]);
        Route::get('/create', [
            'as'=>'slider.create',
            'uses'=>'SliderController@create'
             ]);
        Route::post('/store', [
            'as'=>'slider.store',
            'uses'=>'SliderController@store'
             ]);
        Route::get('/{id}/edit', [
            'as'=>'slider.edit',
            'uses'=>'SliderController@edit'
             ]);
        Route::post('/{id}/update', [
            'as'=>'slider.update',
            'uses'=>'SliderController@update'
             ]);
        Route::get('/{id}/delete', [
            'as'=>'slider.delete',
            'uses'=>'SliderController@destroy'
             ]);
    });
});
Route::get('/admin', 'AdminController@index')->name('admin.home');
// Route::get('/', 'AdminController@login');
// Route::post('/', 'AdminController@post_login');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
// Route::post('users/register', 'Auth\RegisterController@register');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route of DisCount
Route::prefix('discount')->group(function () {
    Route::get('/', ['uses' =>'DiscountController@index','as' => 'dis']);
    Route::get('/create', [  'uses' => 'DiscountController@create', 'as' =>'create_discount']);
    Route::post('/create', [ 'uses' =>'DiscountController@store', 'as' =>'create_discount']);
    Route::get('/{id?}/delete', [ 'uses' =>'DiscountController@destroy','as'=>'delete_discount']);
});
//Route of web
Route::get('/','WebController@index');
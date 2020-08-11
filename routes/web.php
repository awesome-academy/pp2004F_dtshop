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

Route::prefix('admin')->group(function(){
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
        // Route::get('/{id}/edit', [
        //     'as' => 'menus.edit',
        //     'uses'=> 'MenuController@edit'
        // ]);
        // Route::post('/{id}/update', [
        //     'as' => 'menus.update',
        //     'uses'=> 'MenuController@update'
        // ]);
        // Route::get('/{id}/delete', [
        //     'as' => 'menus.delete',
        //     'uses' => 'MenuController@destroy'
        // ]);
    });
});
Route::get('/', function(){
    return view('welcome');
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
Route::prefix('discount')->group(function(){
    Route::get('/', 'DiscountController@index')->name('discount');
    Route::get('/create', 'DiscountController@create')->name('create_discount');
    Route::post('/create', 'DiscountController@store')->name('create_discount');
    Route::get('/{id?}', 'DiscountController@show');
    Route::get('/{id?}/edit', 'DiscountController@edit')->name('edit_discount');
    Route::post('/{id?}/edit', 'DiscountController@update')->name('edit_discount');
    Route::get('/{id?}/delete', 'DiscountController@destroy')->name('delete_discount');
});

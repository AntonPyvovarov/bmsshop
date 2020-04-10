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

Route::get('/', 'Shop\ProductController@index')->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//product controller
Route::group(['namespace'=>'Shop' , 'prefix'=>'shop'], function() {
    Route::resource('products','ProductController')->names('shop.products');
});


Route::get('products/sort/','Shop\SortController@index');
Route::get('products/sort/{id}','Shop\SortController@sort')->name('sort');



//admin product controller
Route::group(['namespace'=>'Shop\Admin\Product','prefix'=>'shop/admin'],function (){
    Route::resource('products','ProductController')
        ->except('show')
        ->names('shop.admin.product');
});

//Admin category controller

Route::group(['namespace'=>'Shop\Admin\Category','prefix'=>'shop/admin'],function (){
    Route::resource('categories','CategoryController')
        ->except('show')
        ->names('shop.admin.category');
});




<?php

use Illuminate\Support\Facades\Route;
use App\Mail\SendMail;
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

/*Static page*/
Route::get('/', 'Shop\ProductController@index')
->name('main');

Route::get('/about', function () {
    return view('static.aboutUs');
})->name('about');

Route::get('/delivery', function () {
    return view('static.delivery');
})->name('delivery');

//contact group
Route::get('contact/create','Shop\ContactController@create')->name('contact');
Route::post('contact','Shop\ContactController@store');

    //email
Route::get('/email', function () {
    return new SendMail();
})->name('mail');


//telegram
Route::get('/telegram',[
    'as'=>'telegram',
    'uses'=>'Shop\TelegramController@telegram'
]);

Auth::routes();
//dashboard
Route::get('/home', 'HomeController@index')->name('home');

//product controller
Route::group(['namespace'=>'Shop' , 'prefix'=>'shop'], function() {
    Route::resource('products','ProductController')->names('shop.products')
        ->except('index');
});

Route::post('/search', [
    'as' => 'search',
    'uses' => 'Shop\ProductController@search'
]);

Route::get('products/category/{id}','Shop\ProductController@sortByCategory')->name('sort');

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






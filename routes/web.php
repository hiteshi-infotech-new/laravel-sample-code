<?php
use App\Http\Controllers\Auth\LoginController;

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

/**
 * Auth routes
 *
 */
Route::prefix('admin')->namespace('Auth\Admin')->group(function(){
    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('admin.logout');
});

/**
 * User routes
 *
 */
Route::prefix('admin')->namespace('Admin')->group(function(){
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('profile', 'DashboardController@profile')->name('admin.profile');  
    Route::post('profile', 'DashboardController@profileUpdate')->name('admin.profile');  
});

Auth::routes();

/**
 * Product routes
 *
 */
Route::resource('Category', 'Admin\CategoryController');

Route::get('product-list', 'Admin\ProductController@index');
Route::get('product-list/{id}/edit', 'Admin\ProductController@edit');
Route::post('product-list/store', 'Admin\ProductController@store');
Route::get('product-list/delete/{id}', 'Admin\ProductController@destroy');

Route::get('brand-list', 'Admin\BrandController@index');
Route::get('brand-list/{id}/edit', 'Admin\BrandController@edit');
Route::post('brand-list/store', 'Admin\BrandController@store');
Route::get('brand-list/delete/{id}', 'Admin\BrandController@destroy');
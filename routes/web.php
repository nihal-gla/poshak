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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/admin/categories', 'AdminController@categories')->name('admin.categories');
Route::get('/admin/categories/add', 'AdminController@createCategoriesView')->name('admin.category.create.view');
Route::get('/admin/categories/{id}/edit', 'AdminController@editCategoriesView')->name('admin.category.edit.view');
Route::post('/admin/categories/add', 'AdminController@createCategories')->name('admin.category.create.edit');
Route::post('/admin/categories/{id}/edit', 'AdminController@editCategories')->name('admin.category.edit.edit');
Route::get('/admin/categories/{id}/delete', 'AdminController@deleteCategory')->name('admin.categories.delete');

Route::get('/admin/products', 'AdminController@products')->name('admin.products');
Route::get('/admin/products/{id}/delete', 'AdminController@deleteProduct')->name('admin.products.delete');

Route::get('/admin/products/add', 'AdminController@createProductsView')->name('admin.products.create.view');
Route::get('/admin/products/{id}/edit', 'AdminController@editProductsView')->name('admin.products.edit.view');
Route::post('/admin/products/add', 'AdminController@createProducts')->name('admin.products.create.edit');
Route::post('/admin/products/{id}/edit', 'AdminController@editProducts')->name('admin.products.edit.edit');

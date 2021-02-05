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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@index')->name('home');
Auth::routes(['register' => true]);
Route::get('/admin/dashboard', 'PagesController@dashboard')->name('admin.dashboard');
Route::get('/admin/main', 'MainPagesController@index')->name('admin.main');
Route::put('/admin/main', 'MainPagesController@update')->name('admin.main.update');
Route::get('/admin/about/create', 'AboutPagesController@create')->name('admin.about.create');
Route::post('/admin/about/create', 'AboutPagesController@store')->name('admin.about.store');
Route::get('/admin/about/list', 'AboutPagesController@list')->name('admin.about.list');
Route::get('/admin/about/edit{id}', 'AboutPagesController@edit')->name('admin.about.edit');
Route::put('/admin/about/update{id}', 'AboutPagesController@update')->name('admin.about.update');
Route::delete('/admin/about/destroy{id}', 'AboutPagesController@destroy')->name('admin.about.destroy');



// Route::get('/home', 'HomeController@index')->name('home');

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
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', 'MainPagesController@dashboard')->name('admin.dashboard');
    Route::get('/main', 'MainPagesController@index')->name('admin.main');
    Route::put('/main', 'MainPagesController@update')->name('admin.main.update');
    Route::get('/about/create', 'AboutPagesController@create')->name('admin.about.create');
    Route::post('/about/create', 'AboutPagesController@store')->name('admin.about.store');
    Route::get('/about/list', 'AboutPagesController@list')->name('admin.about.list');
    Route::get('/about/edit{id}', 'AboutPagesController@edit')->name('admin.about.edit');
    Route::put('/about/update{id}', 'AboutPagesController@update')->name('admin.about.update');
    Route::delete('/about/destroy{id}', 'AboutPagesController@destroy')->name('admin.about.destroy');
    Route::get('/portfolios/create', 'PortfolioPagesController@create')->name('admin.portfolios.create');
    Route::put('/portfolios/create', 'PortfolioPagesController@store')->name('admin.portfolios.store');
    Route::get('/portfolios/list', 'PortfolioPagesController@list')->name('admin.portfolios.list');
    Route::get('/portfolios/edit{id}', 'PortfolioPagesController@edit')->name('admin.portfolios.edit');
    Route::put('/portfolios/update{id}', 'PortfolioPagesController@update')->name('admin.portfolios.update');
    Route::delete('/portfolios/destroy{id}', 'PortfolioPagesController@destroy')->name('admin.portfolios.destroy');
});




// Route::get('/home', 'HomeController@index')->name('home');

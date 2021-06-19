<?php

use App\Http\Controllers\Backend\ArtikelController;
use App\Http\Controllers\Frontend\ArtikelController as AppArtikelController;
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
//     return view('backend.dashboard');
// });
Route::get('/coba', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Backend', 'middleware' => 'auth'] ,function(){
  Route::resource('admin', DashboardController::class);
  Route::resource('video', VideoController::class);
  Route::resource('yayasan', YayasanController::class);
  Route::resource('donasi', DonasiController::class);
  Route::resource('artikel', 'ArtikelController');
  Route::post('artikel/{id}/edit', 'ArtikelController@update')->name('artikel.updates');
  Route::put('donasi/nonactive/{donasi}','DonasiController@nonactive')->name('donasi.nonactive');
  Route::put('donasi/active/{donasi}','DonasiController@active')->name('donasi.active');
});
Route::group(['namespace' => 'Frontend'] ,function(){
  Route::get('/','UserController@index')->name('home');
  Route::get('/artikell', 'ArtikelController@index')->name('artikell.index');
  Route::get('/artikell/{url_artikel}', 'ArtikelController@show')->name('artikell.show');
});

Auth::routes();

Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user');

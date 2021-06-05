<?php

use App\Http\Controllers\Backend\ArtikelController;
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
Route::group(['namespace' => 'Backend'] ,function(){
  Route::resource('video', VideoController::class);
  Route::resource('yayasan', YayasanController::class);
  Route::resource('donasi', DonasiController::class);
  Route::resource('artikel', 'ArtikelController');
  Route::get('admin','DashboardController@index');
  Route::post('/artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
});

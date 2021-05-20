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
//     return view('backend.dashboard');
// });
Route::get('/coba', function () {
    return view('welcome');
});
Route::group(['namespace' => 'Backend'] ,function(){
  Route::get('admin','DashboardController@index');
  Route::get('admin/data_donatur','DashboardController@dataDonatur');
  Route::get('admin/data_donasi','DashboardController@dataDonasi');
  Route::get('admin/tambah_donasi','DashboardController@tambahDonasi');
  Route::get('admin/data_yayasan','DashboardController@dataYayasan');
  Route::get('admin/tambah_yayasan','DashboardController@tambahYayasan');
  Route::get('admin/tambah_video','DashboardController@tambahVideo');
  Route::get('admin/list_video','DashboardController@listVideo');
});

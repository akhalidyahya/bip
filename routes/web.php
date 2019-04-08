<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/makeit', 'MakeitController@index')->name('makeit.index');

Route::get('/pembinaan/datamentah', 'PembinaanController@index')->name('pembinaan.index');

Route::post('/pembinaan/datamentah/store', 'PembinaanController@store')->name('pembinaan.store');

Route::get('/pembinaan/draft', 'PembinaanController@draft')->name('pembinaan');

Route::get('/pembinaan/karantina', 'PembinaanController@karantina')->name('pembinaan');

Route::get('/pembinaan/aktif', 'PembinaanController@aktif')->name('pembinaan');

Route::get('api/makeit', 'MakeitController@apimakeit')->name('apimakeit');

Route::get('api/pembinaan', 'PembinaanController@apipembinaan')->name('apipembinaan');

Route::post('api/makeit/update', 'MakeitController@update')->name('makeit.update');

Auth::routes(['register' => false]);
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('pembinaan/draft/{id}','PembinaanController@draft')->name('pembinaan');


Route::prefix('bip')->group(function(){
  Route::get('profiles/detail/{id}','BusinessController@detail')->name('bip');
  Route::post('profiles/detail/activity/store','BusinessController@storeActivity');
  Route::get('userdata','BusinessController@userdata')->name('bip');
  Route::resource('profiles','BusinessController',['names'=>[
    'index' => 'bip',
    'create' => 'bip',
  ]]);
});

Route::resource('makeit','MakeitController',['names'=>[
  'index'=>'makeit'
]]);

Route::resource('pembinaan','PembinaanController',['names'=>[
  'index'=>'pembinaan'
]]);

Route::get('api/bisnis','BusinessController@apiBisnis')->name('api.bisni');

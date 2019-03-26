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

Auth::routes(['register' => false]);
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

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
Route::get('api/bisnis','BusinessController@apiBisnis')->name('api.bisni');

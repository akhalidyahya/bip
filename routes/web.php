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
    // return view('welcome');
    return redirect('login');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/makeit', 'MakeitController@index')->name('makeit.index');
Route::get('api/makeit', 'MakeitController@apimakeit')->name('apimakeit');
Route::post('api/makeit/update', 'MakeitController@update')->name('makeit.update');


Route::get('/pembinaan/datamentah', 'PembinaanController@index')->name('pembinaan.index');
Route::post('/pembinaan/datamentah/store', 'PembinaanController@store')->name('pembinaan.store');
Route::get('api/pembinaan', 'PembinaanController@apipembinaan')->name('apipembinaan');


Route::get('/pembinaan/draft', 'PembinaanController@draft')->name('pembinaan');
Route::get('/pembinaan/karantina', 'PembinaanController@karantina')->name('pembinaan');
Route::get('/pembinaan/aktif', 'PembinaanController@aktif')->name('pembinaan');

Route::get('/pembinaan/draft','PembinaanController@draft')->name('pembinaan.status2');
Route::get('/pembinaan/karantina','PembinaanController@karantina')->name('pembinaan.status3');
Route::get('/pembinaan/aktif','PembinaanController@aktif')->name('pembinaan.status4');

Route::get('/pembinaan/pindah/{id}/status-2', 'PembinaanController@pindahDraft');
Route::get('/pembinaan/pindah/{id}/status-3', 'PembinaanController@pindahKarantina');
Route::get('/pembinaan/pindah/{id}/status-4', 'PembinaanController@pindahAktif');

Route::get('/api/draft/status-2','PembinaanController@apiDraft')->name('api.draft.2');
Route::get('/api/karantina/status-3','PembinaanController@apiKarantina')->name('api.karantina.3');
Route::get('/api/aktif/status-4','PembinaanController@apiAktif')->name('api.aktif.4');

Auth::routes(['register' => false]);
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::prefix('bip')->group(function(){
  Route::get('export','BusinessController@export')->name('business.export');
  Route::get('profiles/detail/{id}','BusinessController@detail')->name('bip');
  Route::post('profiles/detail/activity/store','BusinessController@storeActivity');
  Route::get('userdata','BusinessController@userdata')->name('bip');
  Route::resource('profiles','BusinessController',['names'=>[
    'index' => 'bip',
    'create' => 'bip',
  ]]);
});

Route::get('anggota/export','PembinaanController@export')->name('anggota.export');

Route::resource('makeit','MakeitController',['names'=>[
  'index'=>'makeit'
]]);

Route::resource('pembinaan','PembinaanController',['names'=>[
  'index'=>'pembinaan'
]]);

Route::prefix('pengaturan')->group(function(){
  Route::resource('kolam','KolamController',['names'=>[
    'index' => 'pengaturan',
  ]]);
});

Route::get('api/bisnis','BusinessController@apiBisnis')->name('api.bisni');
// Route::get('api/userdatabip','PembinaanController@apiUserdataBip')->name('api.userdata.bip');

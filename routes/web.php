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

// Route::get('/makeit', 'MakeitController@index')->name('makeit.index');
// Route::get('api/makeit', 'MakeitController@apimakeit')->name('apimakeit');
// Route::post('api/makeit/update', 'MakeitController@update')->name('makeit.update');


Route::get('/member/datamentah', 'MemberController@index')->name('member.index');
Route::post('/member/datamentah/store', 'MemberController@store')->name('member.store');
Route::get('api/member', 'MemberController@apimember')->name('apimember');


Route::get('/member/draft', 'MemberController@draft')->name('member');
Route::get('/member/karantina', 'MemberController@karantina')->name('member');
Route::get('/member/aktif', 'MemberController@aktif')->name('member');

Route::get('/member/draft','MemberController@draft')->name('member.status2');
Route::get('/member/karantina','MemberController@karantina')->name('member.status3');
Route::get('/member/aktif','MemberController@aktif')->name('member.status4');

Route::get('/member/pindah/{id}/status-2', 'MemberController@pindahDraft');
Route::get('/member/pindah/{id}/status-3', 'MemberController@pindahKarantina');
Route::get('/member/pindah/{id}/status-4', 'MemberController@pindahAktif');

Route::get('/api/draft/status-2','MemberController@apiDraft')->name('api.draft.2');
Route::get('/api/karantina/status-3','MemberController@apiKarantina')->name('api.karantina.3');
Route::get('/api/aktif/status-4','MemberController@apiAktif')->name('api.aktif.4');

Auth::routes(['register' => false]);
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::prefix('bip')->group(function(){
  Route::get('export','BusinessController@export')->name('business.export');
  Route::get('profiles/detail/{id}','BusinessController@detail')->name('bip');
  Route::get('profiles/{id}/anggota','BusinessController@anggota')->name('bip');
  Route::patch('profiles/anggota/hapus/{id}','BusinessController@removeAnggota')->name('bip');
  Route::patch('profiles/anggota/tambah/{id}/{bisnis}','BusinessController@tambahAnggota')->name('bip');
  Route::post('profiles/detail/activity/store','BusinessController@storeActivity');
  Route::get('userdata','BusinessController@userdata')->name('bip');
  Route::post('userdata/save','BusinessController@simpanAnggota')->name('userdata.bip.store');
  Route::post('userdata/makeit/save','BusinessController@simpanAnggotaMakeit')->name('userdata.makeit.store');
  Route::patch('userdata/update/{id}','BusinessController@updateAnggota')->name('userdata.bip.update');
  Route::get('userdata/{id}/destroy','BusinessController@destroyAnggota')->name('userdata.bip.destroy');
  Route::resource('profiles','BusinessController',['names'=>[
    'index' => 'bip',
    'create' => 'bip',
    'edit' => 'bip',
  ]]);
});

Route::get('anggota/export','MemberController@export')->name('anggota.export');

// Route::resource('makeit','MakeitController',['names'=>[
//   'index'=>'makeit'
// ]]);

Route::resource('member','MemberController',['names'=>[
  'index'=>'member'
]]);

Route::prefix('pengaturan')->group(function(){
  Route::resource('event','EventController',['names'=>[
    'index' => 'pengaturan',
  ]]);
});

Route::get('api/bisnis','BusinessController@apiBusiness')->name('api.bisni');
Route::get('api/anggotabip/{bisnis}','BusinessController@apiAnggotaBIP')->name('api.anggota.bip');
Route::get('api/anggotakelompok/{id}','BusinessController@apiAnggotaKelompok')->name('api.anggota.kelompok');
// Route::get('api/userdatabip','MemberController@apiUserdataBip')->name('api.userdata.bip');
Route::delete('delete/activity/{id}','BusinessController@deleteActivity');
Route::get('test/{id}','BusinessController@test');

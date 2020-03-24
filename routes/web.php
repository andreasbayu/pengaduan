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

// Route::get('/', function () {
//     return view('user.auth.login');
// });

Route::get('/','UserController@login');

//User Punya
Route::get('/user/login','UserController@login');
Route::post('/user/loginPost','UserController@loginPost');
Route::get('/user/register','UserController@register');
Route::post('/user/registerPost','UserController@registerPost');
Route::get('/user/logout','UserController@logout');

//User Login Punya
Route::group(['middleware'=> ['cekLoginUser']],function(){
    Route::get('/user/home','UserController@index');
    //tulis Laporan
    Route::get('/user/report','UserController@laporanUser');
    Route::post('/user/postReport','UserController@postLaporanUser');
    //data laporan terkirim
    Route::get('/user/laporan_terkirim','PengaduanController@index');
    Route::get('/user/deleteReport/{id}','PengaduanController@destroy');
    Route::get('/user/laporan_dihapus','PengaduanController@trash');
    Route::get('/user/reportRestore/{id}','PengaduanController@trashRestore');
    Route::get('/user/reportDeletePermanent/{id}','PengaduanController@deletePermanent');
    Route::get('user/profile','UserController@userProfile');
    Route::post('user/updateProfile/{nik}','UserController@updateProfile');
    Route::get('/user/laporan_ditanggapi','PengaduanController@show');
});

//admin punya
Route::group(['middleware' => ['cekLoginAdmin']], function(){
    // admin Login punya
    Route::get('/admin/logout','PetugasController@adminLogout');
    Route::get('/admin/dashboard','PetugasController@index');
    Route::get('/admin/daftar_laporan','TanggapanController@index');
    Route::get('/admin/data_laporan','TanggapanController@dataLaporan');
    Route::get('/refresh','TanggapanController@refresh');
    Route::post('/terima/{id}','TanggapanController@terima');
    Route::post('/tolak/{id}','TanggapanController@tolak');
    Route::get('/admin/laporan_pending','PetugasController@pengaduan_pending');
    Route::get('/admin/kategori_pelaporan','PetugasController@kategoriPelaporan');
    Route::get('/admin/update_status_pelaporan/{id}','PetugasController@updateStatusPelaporan');
    Route::get('/admin/delete_kategori/{id}','PetugasController@deleteKategori');
    Route::post('/admin/update_kategori/{id}','PetugasController@updateKategori');
    Route::post('/admin/tambah_kategori', 'PetugasController@tambahKategori');
    Route::get('/admin/daftar_masyarakat','PetugasController@daftarMasyarakat');
    Route::get('/admin/delete_user/{nik}','PetugasController@deleteUser');
    Route::post('/admin/update_user/{nik}','PetugasController@updateUser');
    Route::post('/admin/tambah_user','PetugasController@tambahUser');
});

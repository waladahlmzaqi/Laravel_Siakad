<?php

use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\SiswaController;

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
    return view('auth/login');
 });


Auth::routes();
//  Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/dashboard', function () { return view('dashboard'); });



//admin
Route::get('admin', function () { return view('admin'); })->middleware('checkRole:admin');


//guru


//kurikulum


//kaprog


//walas


//siswa
Route::get('siswa', function () { return view('siswa'); });


//crud siswa
// Route::get('/siswa', function () { return view('admin'); })->name('siswa');
// Route::get('/datasiswa', function () { return view('welcome'); });
Route::resource('siswa', 'SiswaController');
Route::resource('guru', 'GuruController');




Route::middleware(['auth'])->group(function () {
    Route::middleware('checkRole:admin')->group(function () {
        Route::middleware(['trash'])->group(function () {
          Route::get('/jadwal/trash', 'JadwalController@trash')->name('jadwal.trash');
          Route::get('/jadwal/restore/{id}', 'JadwalController@restore')->name('jadwal.restore');
          Route::delete('/jadwal/kill/{id}', 'JadwalController@kill')->name('jadwal.kill');
          Route::get('/guru/trash', 'GuruController@trash')->name('guru.trash');
          Route::get('/guru/restore/{id}', 'GuruController@restore')->name('guru.restore');
          Route::delete('/guru/kill/{id}', 'GuruController@kill')->name('guru.kill');
          Route::get('/kelas/trash', 'KelasController@trash')->name('kelas.trash');
          Route::get('/kelas/restore/{id}', 'KelasController@restore')->name('kelas.restore');
          Route::delete('/kelas/kill/{id}', 'KelasController@kill')->name('kelas.kill');
          Route::get('/siswa/trash', 'SiswaController@trash')->name('siswa.trash');
          Route::get('/siswa/restore/{id}', 'SiswaController@restore')->name('siswa.restore');
          Route::delete('/siswa/kill/{id}', 'SiswaController@kill')->name('siswa.kill');
          Route::get('/mapel/trash', 'MapelController@trash')->name('mapel.trash');
          Route::get('/mapel/restore/{id}', 'MapelController@restore')->name('mapel.restore');
          Route::delete('/mapel/kill/{id}', 'MapelController@kill')->name('mapel.kill');
          Route::get('/user/trash', 'UserController@trash')->name('user.trash');
          Route::get('/user/restore/{id}', 'UserController@restore')->name('user.restore');
          Route::delete('/user/kill/{id}', 'UserController@kill')->name('user.kill');
        });
        Route::get('/admin/home', 'HomeController@admin')->name('admin.home');
        Route::get('/admin/pengumuman', 'PengumumanController@index')->name('admin.pengumuman');
        Route::post('/admin/pengumuman/simpan', 'PengumumanController@simpan')->name('admin.pengumuman.simpan');
        Route::get('/guru/absensi', 'GuruController@absensi')->name('guru.absensi');
        Route::get('/guru/kehadiran/{id}', 'GuruController@kehadiran')->name('guru.kehadiran');
        Route::get('/absen/json', 'GuruController@json');
        Route::get('/guru/mapel/{id}', 'GuruController@mapel')->name('guru.mapel');
        Route::get('/guru/ubah-foto/{id}', 'GuruController@ubah_foto')->name('guru.ubah-foto');
        Route::post('/guru/update-foto/{id}', 'GuruController@update_foto')->name('guru.update-foto');
        Route::post('/guru/upload', 'GuruController@upload')->name('guru.upload');
        Route::get('/guru/export_excel', 'GuruController@export_excel')->name('guru.export_excel');
        Route::post('/guru/import_excel', 'GuruController@import_excel')->name('guru.import_excel');
        Route::delete('/guru/deleteAll', 'GuruController@deleteAll')->name('guru.deleteAll');
        Route::resource('/guru', 'GuruController');
        Route::get('/kelas/edit/json', 'KelasController@getEdit');
        Route::resource('/kelas', 'KelasController');
        Route::get('/siswa/kelas/{id}', 'SiswaController@kelas')->name('siswa.kelas');
        Route::get('/siswa/view/json', 'SiswaController@view');
        Route::get('/listsiswapdf/{id}', 'SiswaController@cetak_pdf');
        Route::get('/siswa/ubah-foto/{id}', 'SiswaController@ubah_foto')->name('siswa.ubah-foto');
        Route::post('/siswa/update-foto/{id}', 'SiswaController@update_foto')->name('siswa.update-foto');
        Route::get('/siswa/export_excel', 'SiswaController@export_excel')->name('siswa.export_excel');
        Route::post('/siswa/import_excel', 'SiswaController@import_excel')->name('siswa.import_excel');
        Route::delete('/siswa/deleteAll', 'SiswaController@deleteAll')->name('siswa.deleteAll');
        Route::resource('/siswa', 'SiswaController');
        Route::get('/mapel/getMapelJson', 'MapelController@getMapelJson');
        Route::get('/mapel/tambahmapel', 'MapelController@index2');
        Route::resource('/mapel', 'MapelController');
        Route::get('/jadwal/view/json', 'JadwalController@view');
        Route::get('/jadwalkelaspdf/{id}', 'JadwalController@cetak_pdf');
        Route::get('/jadwal/export_excel', 'JadwalController@export_excel')->name('jadwal.export_excel');
        Route::post('/jadwal/import_excel', 'JadwalController@import_excel')->name('jadwal.import_excel');
        Route::delete('/jadwal/deleteAll', 'JadwalController@deleteAll')->name('jadwal.deleteAll');
        Route::resource('/jadwal', 'JadwalController');
        Route::get('/ulangan-kelas', 'UlanganController@create')->name('ulangan-kelas');
        Route::get('/ulangan-siswa/{id}', 'UlanganController@edit')->name('ulangan-siswa');
        Route::get('/ulangan-show/{id}', 'UlanganController@ulangan')->name('ulangan-show');
        Route::get('/sikap-kelas', 'SikapController@create')->name('sikap-kelas');
        Route::get('/sikap-siswa/{id}', 'SikapController@edit')->name('sikap-siswa');
        Route::get('/sikap-show/{id}', 'SikapController@sikap')->name('sikap-show');
        Route::get('/rapot-kelas', 'RapotController@create')->name('rapot-kelas');
        Route::get('/rapot-siswa/{id}', 'RapotController@edit')->name('rapot-siswa');
        Route::get('/rapot-show/{id}', 'RapotController@rapot')->name('rapot-show');
        Route::get('/predikat', 'NilaiController@create')->name('predikat');
        Route::resource('/user', 'UserController');
      });
});

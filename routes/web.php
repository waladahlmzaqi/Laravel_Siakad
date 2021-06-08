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







Route::middleware(['auth'])->group(function () {
    Route::middleware('checkRole:admin')->group(function () {
        Route::middleware(['trash'])->group(function () {
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
        Route::get('/guru/mapel/{id}', 'GuruController@mapel')->name('guru.mapel');
        Route::get('/guru/tambahguru', 'MapelController@showmapel');
        Route::resource('/guru', 'GuruController');
        Route::get('/kelas/edit/json', 'KelasController@getEdit');
        Route::get('/kelas/createkelas', 'KelasController@index3');
        Route::get('/kelas/showsiswa', 'KelasController@index2')->name('kelas.showsiswa');
        Route::resource('/kelas', 'KelasController');
        Route::get('/siswa/kelas/{id}', 'SiswaController@kelas')->name('siswa.kelas');
        Route::get('/siswa/view/json', 'SiswaController@view');
        Route::get('/siswa/createsiswa', 'PayloadController@index2')->name('siswa.createsiswa');
        Route::resource('/siswa', 'SiswaController');
        Route::get('/mapel/tambahmapel', 'MapelController@createmapel');
        Route::get('/mapel/tambahguru', 'MapelController@createguru');
        Route::get('/mapel/tambahsiswa', 'MapelController@createsiswa');
        Route::resource('/mapel', 'MapelController');
        Route::get('/jadwal/view/json', 'JadwalController@view');
        Route::resource('/user', 'UserController');
      });
});

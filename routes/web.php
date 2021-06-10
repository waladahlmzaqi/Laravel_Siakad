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
// Route::get('admin', function () { return view('admin'); })->middleware('checkRole:admin');

//siswa
Route::get('siswa', function () { return view('siswa'); });







Route::middleware(['auth'])->group(function () {
    Route::middleware('checkRole:admin')->group(function () {
        Route::get('/admin/home', 'HomeController@admin')->name('admin.home');

        Route::get('/mapel/trash', 'MapelController@trash')->name('mapel.trash');
        Route::delete('/mapel/kill/{id}', 'MapelController@kill')->name('mapel.kill');
        Route::get('/mapel/restore/{id}', 'MapelController@restore')->name('mapel.restore');
        Route::get('/mapel/tambahmapel', 'MapelController@createmapel');
        Route::resource('/mapel', 'MapelController');

        Route::get('/guru/trash', 'GuruController@trash')->name('guru.trash');
        Route::delete('/guru/kill/{id}', 'GuruController@kill')->name('guru.kill');
        Route::get('/guru/restore/{id}', 'GuruController@restore')->name('guru.restore');
        Route::get('/guru/mapel/{id}', 'GuruController@mapel')->name('guru.mapel');
        Route::get('/guru/tambahguru', 'GuruController@createguru');
        Route::resource('/guru', 'GuruController');

        Route::get('/kelas/trash', 'KelasController@trash')->name('kelas.trash');
        Route::delete('/kelas/kill/{id}', 'KelasController@kill')->name('kelas.kill');
        Route::get('/kelas/restore/{id}', 'KelasController@restore')->name('kelas.restore');
        Route::get('/kelas/siswa/{id}', 'KelasController@siswa')->name('kelas.siswa');
        Route::get('/kelas/showsiswa', 'KelasController@showsiswa')->name('kelas.showsiswa');
        Route::get('/kelas/tambahkelas', 'KelasController@createkelas');
        Route::resource('/kelas', 'KelasController');

        Route::get('/siswa/trash', 'SiswaController@trash')->name('siswa.trash');
        Route::delete('/siswa/kill/{id}', 'SiswaController@kill')->name('siswa.kill');
        Route::get('/siswa/restore/{id}', 'SiswaController@restore')->name('siswa.restore');
        Route::get('/siswa/kelas/{id}', 'SiswaController@kelas')->name('siswa.kelas');
        Route::get('/siswa/tambahsiswa', 'SiswaController@createsiswa');
        Route::resource('/siswa', 'SiswaController');



        Route::resource('/user', 'UserController');
      });
});

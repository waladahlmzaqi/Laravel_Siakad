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



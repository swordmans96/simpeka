<?php

use App\Http\Controllers\AspekController;
use App\Http\Controllers\DatatablesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PenilaianController;
use App\Models\Divisi;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('divisi', DivisiController::class);
Route::get('/datadivisi', [DatatablesController::class, 'divisi']);
Route::resource('jabatan', JabatanController::class);
Route::get('/datajabatan', [DatatablesController::class, 'jabatan']);
Route::resource('/pegawai', PegawaiController::class);
Route::get('/datapegawai', [DatatablesController::class, 'pegawai']);
Route::resource('/kategori', KategoriController::class);
Route::get('/datakategori', [DatatablesController::class, 'kategori']);
Route::resource('/kriteria', KriteriaController::class);
Route::get('/datakriteria', [DatatablesController::class, 'kriteria']);
Route::resource('/aspek', AspekController::class);
Route::get('/dataaspek', [DatatablesController::class, 'aspek']);
Route::get('/persen/{id}', [AspekController::class, 'persen']);
Route::resource('/kriteria', KriteriaController::class);
Route::get('/datakriteria', [DatatablesController::class, 'kriteria']);
Route::resource('/lappen', PenilaianController::class);






Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});

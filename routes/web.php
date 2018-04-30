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

Route::get('/', 'Webfront@index');
Route::get('/about','Webfront@about');
Route::get('/contact','Webfront@contact');





Route::group(['prefix' => 'backend','middleware' => 'checklogin'], function () {
    
    // DASHBOARD
    Route::get('/','DashboardController@index');
    // DASHBOARD
    Route::get('dashboard', 'DashboardController@index');
    // PENYAKIT
    Route::get('penyakit', 'PenyakitController@index');
    Route::get('penyakit/search', 'PenyakitController@search');
    Route::post('penyakit/searchproses', 'PenyakitController@searchproses');
    Route::get('penyakit/add', 'PenyakitController@add');
    Route::get('penyakit/{id}/update', 'PenyakitController@update');
    Route::get('penyakit/{id}/delete', 'PenyakitController@delete');
    Route::post('penyakit/addproses', 'PenyakitController@addproses');
    Route::post('penyakit/updateproses', 'PenyakitController@updateproses');
    // GEJALA
    Route::get('gejala', 'GejalaController@index');
    Route::get('gejala/add','GejalaController@add');
    Route::get('gejala/{id}/update', 'GejalaController@update');
    Route::get('gejala/{id}/deleted', 'GejalaController@deleted');
    Route::post('gejala/addproses','GejalaController@addproses');
    Route::post('gejala/updateproses','GejalaController@updateproses');
    // PENYEBAB
    Route::get('penyebab', 'PenyebabController@index');
    Route::get('penyebab/add','PenyebabController@add');
    Route::post('penyebab/add_proses','PenyebabController@add_proses');
    Route::get('penyebab/{id}/edit/','PenyebabController@edit');
    Route::post('penyebab/update_proses/','PenyebabController@update_proses');
    Route::get('penyebab/{id}/delete/','PenyebabController@delete');

      // SOLUSI
    Route::get('solusi', 'SolusiController@index');
    Route::get('solusi/add', 'SolusiController@add');
    Route::get('solusi/{id}/update', 'SolusiController@update');
    Route::get('solusi/{id}/deleted', 'SolusiController@deleted');
    Route::post('solusi/addproses', 'SolusiController@addproses');
    Route::post('solusi/updateproses', 'SolusiController@updateproses');

    //  BASIS ATURAN
    Route::get('basis-aturan','BasisController@index');
    Route::get('basis-aturan-create','BasisController@add');
    Route::post('basis-aturan-created','BasisController@add_rules');
    Route::get('basis-aturan/{id}/detail','BasisController@detail');
    Route::get('basis-aturan/{id}/delete','BasisController@delete');
    Route::post('basis-aturan-update','BasisController@update_rules');

    // ACCOUNT
    Route::get('account', 'admin@listdata');
    Route::get('account/add', 'admin@add');
    Route::get('account/{id}/update', 'admin@update');
    Route::get('account/{id}/delete', 'admin@delete');
    Route::post('account/addproses','admin@addproses');
    Route::post('account/updateproses','admin@updateproses');
    Route::get('profile', 'admin@profile');

    // USULAN
    Route::get('usulan','UsulanController@index');

    // PASIEN
    Route::get('pasien','PasienController@index');
    Route::get('pasien/{id}/info','PasienController@info');
    Route::get('pasien/{id}/delete','PasienController@deleted');

    Route::get('history','DashboardController@history');
    Route::get('history/{id}/detail','DashboardController@history_detail');


});


Route::group(['prefix' => 'administrator'], function () {
    Route::get('/', function () {
        return view('admin.login');
    });
    Route::get('/login', function () {
        return view('admin.login');
    });
    Route::post('/login','WelcomeController@cekLogin');
    Route::get('/logout','WelcomeController@logout');

    
});


Route::group(['prefix' => 'membership'], function () {
    Auth::routes();
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/diagnosa', 'HomeController@diagnosa')->name('diagnosa');
    Route::get('/hasil-diagnosa', 'HomeController@viewhasil')->name('hasil-diagnosa');
    Route::get('/profil', 'HomeController@profil')->name('profil');
    Route::get('/informasi-aplikasi','HomeController@infoapps');
    Route::post('/diagnosaproses','HomeController@prosesdiagnosa');
});
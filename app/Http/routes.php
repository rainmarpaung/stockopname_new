<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Milon\Barcode\DNS2D as DNS2D;
use Milon\Barcode\DNS1D as DNS1D;
use JasperPHP\JasperPHP as JasperPHP;

Route::group(['middleware' => ['web']], function(){
	Route::get('/', 'StockOpnameController@index');
	Route::get('mulai', 'StockOpnameController@mulai')->name('mulai');
	Route::get('verifikasi', 'StockOpnameController@verifikasi')->name('verifikasi');
	Route::post('simpan', 'StockOpnameController@simpan')->name('simpan');
	Route::post('reportso', 'StockOpnameController@reportSO')->name('reportso');
	
	$this->get('login', 'Auth\AuthController@showLoginForm');
	$this->post('login', 'Auth\AuthController@login');
	$this->get('logout', 'Auth\AuthController@logout');

	
	
});
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
Route::get('/', function () {
    return view('auth.login');
});
Route::auth();

//Halaman Welcome
Route::get('/home', 'HomeController@index');

//daftar pendanaan crowd
Route::get('/dashboard/daftarpenggalangan','daftarPendanaanController@showpage');
Route::post('uploadpendanaan','daftarPendanaanController@uploadpendanaan');
//laporan bulanan
Route::get('/dashboard/pendanaan/{id}','crowdController@index');
Route::get('/dashboard/showReportPendanaan','crowdController@listReportCrowd');
		//save laporan bulanan
Route::post('/createlaporancrowd','crowdController@createLaporanCrowd');
		//menampilkan grafik
Route::get('/api/crowd-report', 'ApiController@crowdReport');
		// menampilkan detail laporan harian
Route::get('/dashboard/detail_laporan_crowdfunding/{id}','crowdController@detailReport');
				//menampilkan tabel harian
Route::post('/uploaddetaillaporan','crowdController@uploaddetaillaporan');
				//menampilkan grafik harian
Route::get('/api/crowd-usage-report', 'ApiController@crowdUsageReport');



//daftar pendanaan bank
Route::get('/dashboard/daftarpendanaanbank','daftarPendanaanController@showfund');
Route::post('createFundBank','daftarPendanaanController@createFundBank');
	//list pendanaan bank
	Route::get('/dashboard/listPendanaanBank','bankController@fundReport');
	//grafik
	Route::get('/api/bank-report', 'ApiControllerBank@ReportBank');
	//laporan bank
	Route::get('/dashboard/showReportPendanaanBank','bankController@listReportBank');

		//create laporan bulanan
	Route::post('/createlaporanbank','bankController@createLaporanBank');

	//laporan detail bank
	Route::get('/dashboard/detail_laporan_bank/{id}','bankController@detailReport');
	//menampilkan tabel harian
	Route::post('/uploaddetaillaporanbank','bankController@uploaddetaillaporan');



//kelola ziswaf
	//Pendanaan dari ziswaf
Route::get('/dashboard/listPendanaanZiswaf','ziswafController@fundReport');
	//
Route::get('/dashboard/showReportPendanaanZiswaf','ziswafController@listReportZiswaf');	
		//grafik bulanan
Route::get('/api/ziswaf-report', 'ApiControllerZiswaf@ReportZiswaf');
		//create laporan bulanan
Route::post('/createLaporanZiswaf','ziswafController@createLaporanZiswaf');
Route::get('/dashboard/detail_laporan_ziswaf/{id}','ziswafController@detailReport');
			//create laporan harian
Route::post('/uploaddetaillaporanziswaf','ziswafController@uploaddetaillaporan');
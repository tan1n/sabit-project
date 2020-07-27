<?php

use Illuminate\Support\Facades\Route;

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

Route::post('appointment','UserController@appointment')->name('appointment');

Route::post('book','UserController@book')->name('book');

Route::post('/checkout','UserController@checkout')->name('checkout');

Route::resource('shift','ShiftController');

Route::resource('test','TestController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search/cat','FrontController@searchByCat')->name('searchByCat');

Route::get('/search','FrontController@search')->name('search');

Route::get('/find','FrontController@find')->name('find');

Route::get('/','FrontController@index')->name('home');

Route::get('/location','FrontController@location');

Route::get('/review/add/{doctor_id}','UserController@review');
Route::post('/review/add/{doctor_id}','UserController@review_add');

Route::get('/reviews/show/{doctor_id}','FrontController@reviews');


Auth::routes();

Route::get('/doctor/login','DoctorController@login')->name('doctor.login');
Route::post('/doctor/login','DoctorController@loginDoctor');


Route::prefix('diagnostic')->group(function(){
    Route::name('diagnostic.')->group(function(){
        Route::get('dashboard','DiagnosticController@dashboard')->name('dashboard');
        Route::get('reports','DiagnosticController@reports')->name('reports');
        Route::get('report/create','DiagnosticController@createReport')->name('report.create');
        Route::post('report','DiagnosticController@storeReport')->name('report.store');
        Route::get('login','DiagnosticController@loginShow')->name('login');
        Route::post('login','DiagnosticController@login');
    });
});

Route::get('download/reports/{file}','FrontController@reportDownload');

Route::prefix('doctor')->group(function(){
    Route::name('doctor.')->group(function(){
        Route::get('dashboard','DoctorController@dashboard')->name('dashboard');
        Route::get('appointments','DoctorController@appointments')->name('appointments');
        Route::get('patients','DoctorController@patients')->name('patients');
        Route::get('schedule','DoctorController@schedule')->name('shifts');
        Route::post('schedule','DoctorController@updateSchedule')->name('shifts.update');
        Route::get('profile','DoctorController@profile')->name('profile');
        Route::get('reviews','DoctorController@reviews')->name('reviews');
    });
});

Route::resource('doctor','DoctorController');

Route::get('/myappointments','UserController@appointments');

Route::get('/mytests','UserController@report');

Route::post('/checkout','UserController@checkout')->name('checkout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

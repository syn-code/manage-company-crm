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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth'], function () {
    //Route::get('/company/create', 'CompanyController@index')->name('company-create');
    Route::resource('company', 'CompanyController');
    //this route is only used for querying the company
    Route::get('/get-company', 'CompanyController@getCompany');

    Route::get('/show-companies', 'CompanyController@showCompanies');
});


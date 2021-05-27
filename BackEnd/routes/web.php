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

Route::get('/','HomeController@HomeIndex');

Route::get('/visitor','VisitorController@VisitorIndex');

/*** START FEATURES SECTION ROUTE ***/
Route::get('/features','FeaturesController@FeaturesIndex');
Route::get('/getFeaturesData','FeaturesController@getFeaturesData');
Route::post('/featuresAddNew','FeaturesController@featuresAddNew');
//Route::post('/AddNew','FeaturesController@AddNew')->name('AddNew');
Route::post('/featuresDetails','FeaturesController@getFeaturesDetails');
Route::post('/featuresUpdate','FeaturesController@featuresUpdate');
Route::post('/featuresDelete','FeaturesController@featuresDelete');
/*** END FEATURES SECTION ROUTE ***/

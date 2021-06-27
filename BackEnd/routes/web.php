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

/*** START PROJECT SECTION ROUTE ***/
Route::get('/project','ProjectController@ProjectIndex');
Route::get('/getProjectData','ProjectController@getProjectData');
Route::post('/projectAddNew','ProjectController@ProjectAddNew');
Route::post('/projectDetails','ProjectController@getProjectDetails');
Route::post('/projectUpdate','ProjectController@projectUpdate');
Route::post('/projectDelete','ProjectController@projectDelete');
/*** END PROJECT SECTION ROUTE ***/

/*** START TEAM SECTION ROUTE ***/
Route::get('/team','TeamController@TeamIndex');
Route::get('/getTeamData','TeamController@getTeamData');
Route::post('/teamAddNew','TeamController@TeamAddNew');
Route::post('/teamDetails','TeamController@getTeamDetails');
Route::post('/teamUpdate','TeamController@teamUpdate');
Route::post('/teamDelete','TeamController@teamDelete');
/*** END TEAM SECTION ROUTE ***/

/*** START COUNTER SECTION ROUTE ***/
Route::get('/counter','CounterController@CounterIndex');
Route::get('/getCounterData','CounterController@getCounterData');
Route::post('/updateCounter','CounterController@updateCounter');
/*** END COUNTER SECTION ROUTE ***/


/*** START CONTACT SECTION ROUTE ***/
Route::get('/contact','ContactController@ContactIndex');
Route::get('/getContactData','ContactController@getContactData');
Route::post('/deleteContact','ContactController@deleteContact');
/*** END CONTACT SECTION ROUTE ***/
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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'role:patient'], function() {
        Route::get('/', 'HomeController@index');
        Route::get('/encounter', 'HomeController@encounter');
        Route::get('/research', 'HomeController@research');
        Route::get('/test', 'HomeController@test');
    });

    Route::group(['middleware' => 'role:practitioner'], function() {
        Route::resource('patient', 'PatientController');
        Route::resource("patient.encounter", "EncounterController", [
            'parameters' => 'singular'
        ]);
        Route::resource("patient.research", "ResearchController", [
            'parameters' => 'singular'
        ]);
        Route::resource("patient.test", "TestController", [
            'parameters' => 'singular'
        ]);
    });

    Route::group(['middleware' => 'role:admin'], function() {
        Route::resource('user', 'UserController');
    });

    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('/role', 'UserController@setRole');
});

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');
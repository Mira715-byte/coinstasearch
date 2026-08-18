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


Route::get('/', 'HomeController@index');


Auth::routes();


Route::get('/home', 'HomeController@index');

Route::get( '/register', ['uses' => 'Auth\RegisterController@register'] );
Route::post( '/doregisteruser', ['uses' => 'Auth\RegisterController@doRegisterUser'] );
Route::post( '/doregistercompany', ['uses' => 'Auth\RegisterController@doRegisterCompany'] );

Route::resource('companies', 'CompaniesController');

Route::get( '/userhome', ['uses' => 'HomeController@userhome'] );

Route::get( '/companyhome', ['uses' => 'HomeController@companyhome'] );
Route::get( '/listafirme/{id}', ['uses' => 'CompaniesController@show'] );

Route::get( '/select-city', ['uses' => 'CitiesController@index'] );
Route::get( '/select-county', ['uses' => 'CountiesController@index'] );
Route::get( '/select-domain', ['uses' => 'DomainsController@index'] );

Route::post( '/doupdatecompanyprofile', ['uses' => 'CompaniesController@upload'] );

Route::get( 'login', ['uses' => 'Auth\LoginController@showLogin'] );

Route::post( 'dologin', ['uses' => 'Auth\LoginController@doLogin'] );

Route::get( '/logout', ['uses' => 'Auth\LoginController@doLogout'] );


Route::get( '/editcompany', function () {
	$identity = Auth::user();
	$company = Auth::user()->company();
	return View::make( 'companies.edit', ['company' => $company, 'identity' => $identity] );
} );



Route::put( '/editcompany', ['uses' => 'CompaniesController@update'] );

Route::get( '/companyhome/profile', function () {
	$identity = Auth::user();
	$company = Auth::user()->company();
	return View::make( 'company.profile', ['identity' => $identity, 'company' => $company] );
} );	

Route::get( '/companyhome/settings', function () {
    $identity = Auth::user();
    $company = Auth::user()->company();
    return View::make( 'companies.settings', ['identity' => $identity, 'company' => $company] );
} );

Route::get( '/userhome/settings', function () {
    $identity = Auth::user();
    $user = Auth::user()->user();
    return View::make( 'users.settings', ['identity' => $identity, 'user' => $user] );
} );

    Route::put( 'email', ['uses' => 'CompaniesController@updateEmail'] );
    Route::put( 'password', ['uses' => 'CompaniesController@updatePassword'] );

    Route::put( 'email', ['uses' => 'UsersController@updateEmail'] );
    Route::put( 'password', ['uses' => 'UsersController@updatePassword'] );

Route::group( ['prefix' => 'admin'], function () {

    Route::get( '/', 'AdminController@index' );
    Route::get( 'companies', 'AdminController@companies' );
    Route::get( 'users', 'AdminController@users' );
    Route::get( 'contactform', 'AdminController@contactForm' );
    Route::get( 'do-delete-company', 'AdminController@doDeleteCompany' );
    Route::get( 'do-delete-user', 'AdminController@doDeleteUser' );
    Route::get( 'do-delete-contactform', 'AdminController@doDeleteContactForm' );
} );



Route::get('listafirme', 'CompaniesSearchController@search');
Route::get('listafirme', 'CompaniesController@index');



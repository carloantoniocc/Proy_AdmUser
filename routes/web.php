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



Route::get('/', 'WelcomeController@index'); 
//Route::get('/', 'HomeController@index'); 


//Auth::routes(); se reemplaza con 
// Authentication Routes...
route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
route::post('login', 'Auth\LoginController@login');
route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes... el sistema no necesita registro, (se eliminan las referencias en las vistas)
//route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/Establishment', 'EstablishmentController');
Route::resource('/Department', 'DepartmentController');
Route::resource('/Categorie', 'CategorieController');
Route::resource('/PhoneModel', 'PhoneModelController');
Route::resource('/Employe', 'EmployeController');
Route::resource('/Welcome', 'WelcomeController');
Route::get('/search', 'WelcomeController@search');
Route::get('/buscarfuncionario', 'EmployeController@search');

//RUTAS COMUNA
Route::resource('comunas','ComunasController');

//RUTAS TIPO ESTABLECIMIENTO
Route::resource('tipoEstabs','TipoEstabsController');

//RUTAS ADMINISTRACION DE USUARIOS
Route::resource('users','UsersController');

//RUTAS ASIGNAR ROLES
Route::get('users/asignRole/{user}', 'UsersController@asignRole');
Route::post('users/saveRole', 'UsersController@saveRole');

//RUTAS ASIGNAR ESTABLECIMIENTOS
Route::get('users/asignEstab/{user}', 'UsersController@asignEstab');
Route::post('users/saveEstab', 'UsersController@saveEstab');

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

Route::get('/index', function () {
  return view('welcome');
});

//Contact
Route::get('/contatos', 'ContactController@index')->name('contactsIndex');
Route::post('/contato', 'ContactController@update')->name('contactUpdate');
Route::post('/contaton', 'ContactController@store')->name('contactStore');
Route::post('/contato/{idcontact}', 'ContactController@destroy')->name('deleteContact');

//Company
Route::get('/empresas', 'CompanyController@index')->name('companiesIndex');
Route::post('/empresa', 'CompanyController@store')->name('companyStore'); 
Route::post('/empresan', 'CompanyController@update')->name('companyUpdate'); //?
Route::post('/empresa/{idcompany}', 'CompanyController@destroy')->name('companyDestroy');

//Deal
Route::get('/negocios', 'DealController@index')->name('dealsIndex');
Route::post('/negocio', 'DealController@store')->name('dealStore'); 
Route::post('/negocio/{iddeal}', 'DealController@destroy')->name('dealDestroy');


//Views 
Route::get('/viewEmpresa', 'ViewController@viewCompanies')->name('viewCompanies');
Route::get('/viewContato', 'ViewController@viewContacts')->name('viewContact');
Route::get('/viewNegocio', 'ViewController@viewDeals')->name('viewDeals');
Route::get('/viewCriarEmpresa', 'ViewController@viewStoreCompany')->name('viewCompanyStore');
Route::get('/viewCriarContato', 'ViewController@viewStoreContact')->name('viewContactStore');
Route::get('/viewCriarNegocio', 'ViewController@viewStoreDeal')->name('viewDealStore');
Route::post('/viewEditarEmpresa/{idcompany}', 'ViewController@viewUpdateCompany')->name('viewCompanyUpdate');
Route::post('/viewEditarContato/{idcontact}', 'ViewController@viewUpdateContact')->name('viewContactUpdate');

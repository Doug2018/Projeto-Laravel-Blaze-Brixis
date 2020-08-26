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

Route::get('/', function () {
  return view('welcome');
});

//mudar os nomes

//Contact
Route::get('/contatos', 'ContactController@index')->name('contactsIndex');
Route::put('/contato/{idContato}', 'ContactController@update')->name('updateContact'); //?
Route::post('/contato', 'ContactController@store')->name('contactStore');
Route::delete('/contato/{idContato}', 'ContactController@destroy')->name('deleteContact');

//Company
Route::get('/empresas', 'CompanyController@index')->name('companiesIndex');
Route::post('/empresa', 'CompanyController@store')->name('companyStore'); 
Route::put('/empresa', 'CompanyController@update')->name('companyUpdate'); //?
Route::post('/empresa/{company}', 'CompanyController@destroy')->name('companyDestroy');

//Deal
Route::get('/negocios', 'DealController@index')->name('dealsIndex');
Route::post('/negocio', 'DealController@store')->name('dealStore'); 
Route::post('/negocio/{deal}', 'DealController@destroy')->name('dealDestroy');


//Views 
Route::get('/viewEmpresa', 'ViewController@viewCompanies')->name('viewCompanies');
Route::get('/viewContato', 'ViewController@viewContacts')->name('viewContact');
Route::get('/viewNegocio', 'ViewController@viewDeals')->name('viewDeals');
Route::get('/viewCriarEmpresa', 'ViewController@viewStoreCompany')->name('viewCompanyStore');
Route::get('/viewCriarContato', 'ViewController@viewStoreContact')->name('viewContactStore');
Route::get('/viewCriarNegocio', 'ViewController@viewStoreDeal')->name('viewDealStore');




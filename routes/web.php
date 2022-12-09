<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('companies', CompanyController::class)->except('destroy');
Route::resource('clients', ClientController::class)->except('destroy');

Route::get('get/companies', [CompanyController::class, 'getCompanies'])->name('get.companies');
Route::get('get/clients', [ClientController::class, 'getClients'])->name('get.clients');
Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::get('companies/create', [CompanyController::class, 'create'])->name('companies.create');
Route::get('get/companies/ajax', [CompanyController::class, 'getCompaniesAjax'])->name('get.companies.ajax');
Route::get('get/clients/ajax', [ClientController::class, 'getClientsAjax'])->name('get.clients.ajax');
Route::get('clients/destroy/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('companies/destroy/{id}', [CompanyController::class, 'destroy'])->name('companies.destroy');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

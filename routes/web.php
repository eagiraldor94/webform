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
*/// Form routes

Route::get('/', 'ViewController@formView');
Route::post('/', 'CustomerController@createCustomer');

// Route for table
Route::get('clients', 'CustomerController@readCustomers');


Route::get('/{any}', 'ViewController@notFoundView')->where('any', '.*');
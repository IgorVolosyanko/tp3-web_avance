<?php
use App\Routes\Route;
use App\Controllers\ClientController;
use App\Controllers\UserController;
use App\Controllers\AuthController;
use App\Controllers\AdminController;

Route::get('/', 'ClientController@index');
Route::get('/client/create', 'ClientController@create');
Route::get('/login', 'ClientController@login');

Route::post('/client/create', 'ClientController@store');
Route::post('/client/login', 'ClientController@user');
Route::get('/client/order', 'ClientController@order');
Route::post('/client/order', 'ClientController@basket');
Route::get('/client/show', 'ClientController@show');
Route::post('/client/show', 'ClientController@show');

Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');

Route::get('/admin/manage', 'AdminController@manage');

Route::get('/admin/add', 'AdminController@add');
Route::post('/admin/add', 'AdminController@store');

Route::get('/admin/edit', 'AdminController@edit');
Route::post('/admin/edit', 'AdminController@modify');
Route::post('/admin/delete', 'AdminController@delete');

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::get('/admin/log', 'JournalController@select');
Route::get('/admin/log/pdf', 'JournalController@pdf');


Route::dispatch();
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

Route::get('/login', 'LoginCtrl@index')->name('login.index');
Route::post('/login-proses', 'LoginCtrl@login_proses')->name('login.proses');

Route::get('/dashboard', 'DashboardCtrl@index')->name('dashboard.index');
Route::get('/logout', 'LoginCtrl@logout')->name('logout');

Route::get('/user', 'UserCtrl@index')->name('user.index');
Route::get('/user-create', 'UserCtrl@create')->name('user.create');
Route::post('/user-create', 'UserCtrl@create_proses')->name('user.create.proses');
Route::get('/user-update', 'UserCtrl@update')->name('user.update');
Route::get('/user-details', 'UserCtrl@details')->name('user.details');
Route::get('/user-destroy', 'UserCtrl@destroy')->name('user.destroy');

Route::get('/organization', 'OrganizationCtrl@index')->name('organization.index');
Route::get('/organization-create', 'OrganizationCtrl@create')->name('organization.create');
Route::get('/organization-update', 'OrganizationCtrl@update')->name('organization.update');
Route::get('/organization-details', 'OrganizationCtrl@details')->name('organization.details');
Route::get('/organization-destroy', 'OrganizationCtrl@destroy')->name('organization.destroy');

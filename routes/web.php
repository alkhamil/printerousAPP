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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', 'LoginCtrl@index')->name('login.index');
    Route::post('/login-proses', 'LoginCtrl@login_proses')->name('login.proses');
});

Route::get('/', 'DashboardCtrl@landing_page')->name('landing.page');
Route::get('/user-guide', 'DashboardCtrl@user_guide')->name('user.guide');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardCtrl@index')->name('dashboard.index');
    Route::get('/logout', 'LoginCtrl@logout')->name('logout');

    Route::get('/organization', 'OrganizationCtrl@index')->name('organization.index');
    Route::get('/organization-create', 'OrganizationCtrl@create')->name('organization.create');
    Route::post('/organization-create', 'OrganizationCtrl@create_proses')->name('organization.create.proses');
    Route::get('/organization-update/{id}', 'OrganizationCtrl@update')->name('organization.update');
    Route::post('/organization-update', 'OrganizationCtrl@update_proses')->name('organization.update.proses');
    Route::post('/organization-details', 'OrganizationCtrl@details')->name('organization.details');
    Route::get('/organization-settings/{id}', 'OrganizationCtrl@settings')->name('organization.settings');
    Route::get('/organization-modal-add', 'OrganizationCtrl@modal_add')->name('organization.modal.add');
    Route::post('/organization-modal-add-proses', 'OrganizationCtrl@modal_add_proses')->name('organization.modal.add.proses');
    Route::post('/organization-modal-edit', 'OrganizationCtrl@modal_edit')->name('organization.modal.edit');
    Route::post('/organization-modal-edit-proses', 'OrganizationCtrl@modal_edit_proses')->name('organization.modal.edit.proses');
    Route::get('/organization-modal-delete-proses/{id}', 'OrganizationCtrl@modal_delete_proses')->name('organization.modal.delete');
    Route::get('/organization-destroy/{id}', 'OrganizationCtrl@destroy')->name('organization.destroy');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/user', 'UserCtrl@index')->name('user.index');
        Route::get('/user-create', 'UserCtrl@create')->name('user.create');
        Route::post('/user-create', 'UserCtrl@create_proses')->name('user.create.proses');
        Route::get('/user-update/{id}', 'UserCtrl@update')->name('user.update');
        Route::post('/user-update', 'UserCtrl@update_proses')->name('user.update.proses');
        Route::get('/user-details', 'UserCtrl@details')->name('user.details');
        Route::get('/user-destroy/{id}', 'UserCtrl@destroy')->name('user.destroy');
    });
});




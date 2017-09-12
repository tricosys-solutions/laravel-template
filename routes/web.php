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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Logged in admins cannot access or send requests these pages
Route::group(['middleware' => 'admin_guest'], function() {

    Route::get('admin_login', 'AdminAuth\LoginController@showLoginForm');
    Route::post('admin_login', 'AdminAuth\LoginController@login');

    //Password reset routes
    Route::get('admin_password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
    Route::post('admin_password/reset', 'AdminAuth\ResetPasswordController@reset');
    Route::get('admin_password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
    Route::post('admin_password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
    
});
//Only logged in admins can access or send requests to these pages
Route::group(['middleware' => 'admin_auth'], function() {
    Route::post('admin_logout', 'AdminAuth\LoginController@logout');
    Route::get('/admin_home', 'AdminHomeController@index');
    
    /* User */
    Route::get('/admin_users','User\UserController@index');
    Route::get('/admin_user/{id}','User\UserController@find');
    Route::get('/admin_new_user','User\UserController@newUser');
    Route::post('/admin_create','User\UserController@create');
    Route::put('/admin_update/{id}','User\UserController@update');
    Route::delete('/admin_delete/{id}','User\UserController@delete');
    
    /* Role */
    Route::get('/admin_roles','Role\RoleController@index');
    Route::get('/admin_role_new','Role\RoleController@newRole');
    Route::post('/admin_role_create','Role\RoleController@create');
    Route::get('/admin_role_edit/{id}','Role\RoleController@find');
    Route::put('/admin_role_update/{id}','Role\RoleController@update');
    Route::delete('/admin_role_delete/{id}','Role\RoleController@delete');
});

// OAuth Routes
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

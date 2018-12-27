<?php

Route::get('/', 'Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

//Users DataTables
Route::get('users/user', 'UserController@apiUsers')->name('users.user');


Route::middleware(['auth'])->group(function () 
{
    //Roles
    Route::resource('roles', 'RoleController');

    //Users
    Route::resource('users', 'UserController');

    //Products
    Route::resource('products', 'ProductController');
});

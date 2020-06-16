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

Route::group(['middleware' => 'auth'], function() {
    //
    Route::resource('kategori', 'KategoriController')->except(['create', 'show']);
    Route::resource('produk', 'ProdukController');
    Route::resource('role', 'RoleController')->except(['create', 'edit', 'show', 'update']);
    Route::resource('user', 'UserController')->except(['show']);

    Route::post('/user/permission', 'UserController@addpermission')->name('user.add_permission');

    Route::put('user/permission/{role}', 'UserController@setrolepermission')->name('user.set_role_permission');

    Route::get('/user/rolepermission', 'UserController@rolepermission')->name('user.role_permission');
    Route::get('/user/roles/{id}', 'UserController@roles')->name('user.roles');
    Route::get('/home', 'HomeController@index')->name('home');

});
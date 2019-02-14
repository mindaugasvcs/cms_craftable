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


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/admin-users',                            'Admin\AdminUsersController@index');
    Route::get('/admin/admin-users/create',                     'Admin\AdminUsersController@create');
    Route::post('/admin/admin-users',                           'Admin\AdminUsersController@store');
    Route::get('/admin/admin-users/{adminUser}/edit',           'Admin\AdminUsersController@edit')->name('admin/admin-users/edit');
    Route::post('/admin/admin-users/{adminUser}',               'Admin\AdminUsersController@update')->name('admin/admin-users/update');
    Route::delete('/admin/admin-users/{adminUser}',             'Admin\AdminUsersController@destroy')->name('admin/admin-users/destroy');
    Route::get('/admin/admin-users/{adminUser}/resend-activation','Admin\AdminUsersController@resendActivationEmail')->name('admin/admin-users/resendActivationEmail');
});

/* Auto-generated profile routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/profile',                                'Admin\ProfileController@editProfile');
    Route::post('/admin/profile',                               'Admin\ProfileController@updateProfile');
    Route::get('/admin/password',                               'Admin\ProfileController@editPassword');
    Route::post('/admin/password',                              'Admin\ProfileController@updatePassword');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/brands',                                 'Admin\BrandsController@index');
    Route::get('/admin/brands/create',                          'Admin\BrandsController@create');
    Route::post('/admin/brands',                                'Admin\BrandsController@store');
    Route::get('/admin/brands/{brand}/edit',                    'Admin\BrandsController@edit')->name('admin/brands/edit');
    Route::post('/admin/brands/{brand}',                        'Admin\BrandsController@update')->name('admin/brands/update');
    Route::delete('/admin/brands/{brand}',                      'Admin\BrandsController@destroy')->name('admin/brands/destroy');
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(function () {
    Route::get('/admin/products',                               'Admin\ProductsController@index');
    Route::get('/admin/products/create',                        'Admin\ProductsController@create');
    Route::post('/admin/products',                              'Admin\ProductsController@store');
    Route::get('/admin/products/{product}/edit',                'Admin\ProductsController@edit')->name('admin/products/edit');
    Route::post('/admin/products/{product}',                    'Admin\ProductsController@update')->name('admin/products/update');
    Route::delete('/admin/products/{product}',                  'Admin\ProductsController@destroy')->name('admin/products/destroy');
});
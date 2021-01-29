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


// Login
Route::get('login', 'auth\login\loginController@index');
Route::post('/login', 'auth\login\loginController@login');

Route::group(['middleware' => ['checkIfLoggedIn']], function () {
    // Panel
    Route::get('/admin/panel', 'admin\dashboardController@index');

    // Advertisement
    Route::get('/admin/panel/advertisement', 'admin\advertisement@index');
    Route::post('/admin/panel/advertisement', 'admin\advertisement@addupdate');

    // Categories
    Route::get('/admin/panel/categories', 'admin\categories@index');
    Route::post('/admin/panel/categories/add', 'admin\categories@add');
    Route::post('/admin/panel/categories/delete', 'admin\categories@delete');
    Route::post('/admin/panel/categories/edit', 'admin\categories@update');

    // Provinces
    Route::get('/admin/panel/provinces', 'admin\provinces@index');
    Route::post('/admin/panel/provinces/add', 'admin\provinces@add');
    Route::post('/admin/panel/provinces/delete', 'admin\provinces@delete');
    Route::post('/admin/panel/provinces/edit', 'admin\provinces@update');

    // Cities
    Route::get('/admin/panel/cities', 'admin\cities@index');
    Route::post('/admin/panel/cities/add', 'admin\cities@add');
    Route::post('/admin/panel/cities/delete', 'admin\cities@delete');
    Route::post('/admin/panel/cities/edit', 'admin\cities@update');

    // Small Cities
    Route::get('/admin/panel/smallcities', 'admin\smallcities@index');
    Route::post('/admin/panel/smallcities/add', 'admin\smallcities@add');
    Route::post('/admin/panel/smallcities/delete', 'admin\smallcities@delete');
    Route::post('/admin/panel/smallcities/edit', 'admin\smallcities@update');

    // Small Categories
    Route::get('/admin/panel/smallcategories', 'admin\smallcategoriesController@index');
    Route::post('/admin/panel/smallcategories/add', 'admin\smallcategoriesController@add');
    Route::post('/admin/panel/smallcategories/delete', 'admin\smallcategoriesController@delete');
    Route::post('/admin/panel/smallcategories/edit', 'admin\smallcategoriesController@update');

    // Cards
    Route::get('/admin/panel/cards', 'admin\cards@index');
    Route::post('/admin/panel/cards/addedit', 'admin\cards@addedit');
    Route::post('/admin/panel/cards/delete', 'admin\cards@delete');

    // Change Password
    Route::get('/admin/panel/changepassword', 'admin\changepasswordController@index');
    Route::post('/admin/panel/changepassword', 'admin\changepasswordController@change');
});


    // api
Route::get('/admin/panel/api/getcitiesforprovince', 'admin\api\cities_province_smallcities@getcitiesforprovince');
Route::get('/admin/panel/api/getsmallcitiesforcity', 'admin\api\cities_province_smallcities@getsmallcitiesforcity');
Route::get('/admin/panel/api/getsmallcategoriesforcategory', 'admin\api\cities_province_smallcities@getsmallcategoriesforcategory');

// main page
Route::get('/', 'homeController@index');

// Category
Route::get('/category', 'categoryController@index');


// Logout
Route::get('/logout', 'logoutController@logout');
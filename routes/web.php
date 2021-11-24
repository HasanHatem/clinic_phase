<?php

use Illuminate\Support\Facades\Auth;
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

// Get language
$locale = setLang();

Route::prefix($locale)->group(function () {
    Route::get('/', 'WelcomeController@index')->name('welcome');

    Route::get('contact', 'ContactController@index')->name('contact.index');

    Auth::routes();
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/', 'Admin\AdminController@index')->name('index');

    // Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', 'Admin\UserController@index')->name('index');
        Route::get('create', 'Admin\UserController@create')->name('create');
        Route::post('store', 'Admin\UserController@store')->name('store');
        Route::get('{user}/edit', 'Admin\UserController@edit')->name('edit');
        Route::patch('{user}/update', 'Admin\UserController@update')->name('update');
        Route::delete('{user}/delete', 'Admin\UserController@delete')->name('delete');
    });

    // Settings
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::get('edit', 'Admin\SettingController@edit')->name('edit');
        Route::patch('update', 'Admin\SettingController@update')->name('update');

        // About
        Route::patch('about/update', 'Admin\AboutController@update')->name('about.update');
    });

    // Images
    Route::prefix('images')->name('images.')->group(function () {
        Route::get('/', 'Admin\ImageController@index')->name('index');
        Route::get('create', 'Admin\ImageController@create')->name('create');
        Route::post('store', 'Admin\ImageController@store')->name('store');
        Route::get('{image}/edit', 'Admin\ImageController@edit')->name('edit');
        Route::patch('{image}/update', 'Admin\ImageController@update')->name('update');
        Route::delete('{image}/delete', 'Admin\ImageController@delete')->name('delete');
    });

    // Doctors
    Route::prefix('doctors')->name('doctors.')->group(function () {
        Route::get('/', 'Admin\DoctorController@index')->name('index');
        Route::get('create', 'Admin\DoctorController@create')->name('create');
        Route::post('store', 'Admin\DoctorController@store')->name('store');
        Route::get('{doctor}/edit', 'Admin\DoctorController@edit')->name('edit');
        Route::patch('{doctor}/update', 'Admin\DoctorController@update')->name('update');
        Route::delete('{doctor}/delete', 'Admin\DoctorController@delete')->name('delete');
    });

    // Categories
    Route::prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'Admin\CategoryController@index')->name('index');
        Route::get('create', 'Admin\CategoryController@create')->name('create');
        Route::post('store', 'Admin\CategoryController@store')->name('store');
        Route::get('{category}/edit', 'Admin\CategoryController@edit')->name('edit');
        Route::patch('{category}/update', 'Admin\CategoryController@update')->name('update');
        Route::delete('{category}/delete', 'Admin\CategoryController@delete')->name('delete');
    });

    // Treatments
    Route::prefix('treatments')->name('treatments.')->group(function () {
        Route::get('/', 'Admin\TreatmentController@index')->name('index');
        Route::get('create', 'Admin\TreatmentController@create')->name('create');
        Route::post('store', 'Admin\TreatmentController@store')->name('store');
        Route::get('{treatment}/edit', 'Admin\TreatmentController@edit')->name('edit');
        Route::patch('{treatment}/update', 'Admin\TreatmentController@update')->name('update');
        Route::delete('{treatment}/delete', 'Admin\TreatmentController@delete')->name('delete');
    });

});

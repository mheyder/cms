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

Route::get('/home', 'HomeController@index');

Route::middleware('admin')->prefix('dashboard')->group(function() {
    Route::get('/', function() {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/categories', function() {
        return view('dashboard.categories.show');
    })->name('dashboard.categories.show');

    Route::get('/categories/create', function() {
        return view('dashboard.categories.form');
    })->name('dashboard.categories.create');
});

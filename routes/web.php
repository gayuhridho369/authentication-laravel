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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home')->middleware('verified');

// Route::get('logout', 'LoginController@logout');

// Alternative Routes
Route::middleware('auth')->group(function () {
    Route::get('account/password', 'Account\PasswordController@edit')->name('password.edit');
    Route::patch('account/password', 'Account\PasswordController@update')->name('password.edit');
});

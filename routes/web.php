<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/mycv/{id}', 'App\Http\Controllers\AdminController@show')->name('mycv.show');

Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');
    Route::resource('about', 'App\Http\Controllers\AboutController');
    Route::resource('resume', 'App\Http\Controllers\ResumeController');
});

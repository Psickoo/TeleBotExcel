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


#Export
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/', ['as' => 'export.index', 'uses' => 'UsersController@index']);
    Route::post('/data', ['as' => 'export.data', 'uses' => 'UsersController@exportData']);
});


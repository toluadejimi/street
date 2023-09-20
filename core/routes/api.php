<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('v1', 'ApiController@process')->name('api.v1');


Route::get('process-request', 'ApiController@process_request')->name('api.process-request');
Route::get('process-info', 'ApiController@process_info')->name('api.process-request');
Route::get('fetch-sms', 'ApiController@get_sms')->name('api.fetch-sms');

Route::post('process', 'ApiController@process_debit')->name('api.process');







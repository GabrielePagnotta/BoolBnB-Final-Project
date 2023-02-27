<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->prefix('/apartment')->group(function(){
    Route::get('/', 'ApartmentController@index');
    Route::get('showed/{id}', 'ApartmentController@show');
});

Route::namespace('Api')->prefix('/services')->group(function(){
    Route::get('/', 'ServiceController@index');

});

Route::namespace('Api')->prefix('/aptservices')->group(function(){
    Route::get('/', 'ApartmentServiceController@index');

});

Route::namespace('Api')->prefix('/messages')->group(function(){
    Route::post('/', 'MessageController@store');


});




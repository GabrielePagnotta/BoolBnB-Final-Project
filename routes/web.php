<?php

use App\Http\Controllers\ApartmentController;
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



Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', 'HomeController@index')
        ->name('home');
        // Route::resource('/create', ApartmentController::class);
        Route::get('/create', 'ApartmentController@index')->name('mainPage');
        Route::get('/create', 'ApartmentController@create')->name('addApartment');
    });


Route::get("{any?}", function(){
    return view("guest.home");
})->where("any", ".*");




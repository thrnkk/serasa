<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;

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

Route::post('client/create', 'App\Http\Controllers\ClientController@create');
Route::post('auth', 'App\Http\Controllers\AuthenticationController@authenticate');

Route::middleware([EnsureTokenIsValid::class])->group(function () {

	Route::get('offers', 'App\Http\Controllers\OfferController@index');
	Route::get('offers/{id}', 'App\Http\Controllers\OfferController@show');

	Route::post('offers/{id}/accept', 'App\Http\Controllers\OfferController@accept');

	Route::get('client/offers', 'App\Http\Controllers\ClientController@offers');

});
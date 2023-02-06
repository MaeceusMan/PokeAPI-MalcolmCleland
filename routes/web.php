<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;


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

Route::get('pokemon', [PokemonController::class, 'index']);

Route::get('/pokemon/import', 'App\Http\Controllers\PokemonController@import');

// index route
Route::get('/pokemon', 'App\Http\Controllers\PokemonController@index')->name('pokemon.index');

// tentative update and delete routes
Route::put('/pokemon/{id}', 'PokemonController@update')->name('pokemon.update');
Route::delete('/pokemon/{id}', 'PokemonController@delete')->name('pokemon.delete');
<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);


Route::get('home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/tournaments/showMyTournaments', 'TournamentController@showMyTournaments')->middleware('verified');
Route::get('/tournaments/showSignedTournament', 'TournamentController@showSignedTournament')->middleware('verified');
Route::get('/tournaments/showUpcoming/{days}', 'TournamentController@showUpcoming')->middleware('verified');
Route::get('/tournaments/showAll', 'TournamentController@showAll')->middleware('verified');
Route::get('/tournaments/create', 'TournamentController@createTournament')->middleware('verified');
Route::get('/tournaments/{tournament}', 'TournamentController@show')->middleware('verified');
Route::get('/tournaments/{tournament}/createBoard', 'TournamentController@createBoard')->middleware('verified');
Route::get('/tournaments/{tournament}/edit', 'TournamentController@edit')->middleware('verified');
Route::post('/tournaments/{tournament}', 'TournamentController@update')->middleware('verified');
Route::post('/tournaments', 'TournamentController@store')->middleware('verified');
Route::get('/tournaments/{tournament}/apply', 'TournamentController@signinForm')->middleware( 'verified');
Route::post('/tournaments/{tournament}/apply', 'TournamentController@signup')->middleware( 'verified');

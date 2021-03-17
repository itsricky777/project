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
use App\Game ;
use App\User;
use App\genre;
use APP\gameyear;

Route::get('/', 'PageController@landing');

Auth::routes();

Route::get('/index', 'PageController@landing')->name('index');

Route::get('/', 'PageController@getAutocompleteData');

Route::get('/index', 'PageController@getAutocompleteData')->name('index');

Route::get('/search', 'PageController@getAutocompleteData')->name('search');

Route::resource('', 'PostController');

Route::resource('/index', 'PostController');


Route::group(['middleware'=> ['auth' , 'admin']],function(){

Route::get('/admin' , function(){
	$data=User::all();
	$game=Game::all();
	$genre=genre::all();
	$year=gameyear::all();
	return view('admin.index')->with('data',$data)->with('game' , $game)->with('genre' , $genre)->with('year' , $year);
});

});

Route::get('user', 'PageController@user')->name('user');

Route::get('game', 'PageController@game')->name('game');

Route::get('genre', 'PageController@genre')->name('genre');

Route::get('/admin', 'PageController@admin')->name('admin');

Route::post('input', 'PostController@store')->name('input');

Route::post('inputgenre', 'PostController@storegenre')->name('inputgenre');

Route::delete('destroy/{id}', 'PostController@destroy')->name('destroy');

Route::delete('destroygame/{id}', 'PostController@destroygame')->name('destroygame');

Route::delete('destroygenre/{id}', 'PostController@destroygenre')->name('destroygenre');

Route::post('update/{id}', 'PostController@update')->name('update');

Route::post('Game', 'PageController@homegame')->name('Game');

Route::post('gamesearch', 'PageController@gamesearch')->name('gamesearch');

Route::get('homegame', 'PageController@homegame')->name('homegame');

Route::get('download/{id}', 'PostController@download')->name('download');

Route::get('year', 'PageController@year')->name('year');

Route::delete('destroyyear/{id}', 'PostController@destroyyear')->name('destroyyear');

Route::post('inputyear', 'PostController@storeyear')->name('inputyear');

Route::get('google', function () {
    return view('googleAuth');
});
    
Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

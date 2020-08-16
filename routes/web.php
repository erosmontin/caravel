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

Auth::routes();


#Route::resource(cloudapp, 'AppsController');

Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/cloudapp', 'CloudappsController@index')->name('cloudapp');
Route::post('/cloudapp/{cloudapp}','UtilizesController@store');


Route::view('about','utils.abt')->name('about');
//Route::get('contact','ContactFormController@create');
Route::get('contact','ContactFormController@create')->name('contact.create');
Route::post('contact','ContactFormController@store');
//Route::get('contact','ContactFormController@create');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');


Route::get('/external/{cloudapp}', 'CloudappsController@startup')->name('external');

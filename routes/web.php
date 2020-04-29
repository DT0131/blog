<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return redirect('top');
});

Route::resource('my', 'MyController');

Route::resource('top', 'TopController');

Route::get('/article', 'ArticleController@index');

Route::post('/article', 'ArticleController@store');

Route::get('post/{id}', 'PostController@post');

Route::resource('contact', 'ContactController');
Route::post('/contact', 'ContactController@store');

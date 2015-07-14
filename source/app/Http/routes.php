<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/* Páginas estáticas */
Route::get('/', 'StaticPagesController@home');
Route::get('home', 'StaticPagesController@home');
Route::get('autoridades', 'StaticPagesController@autoridades');
Route::get('contacto', 'StaticPagesController@contacto');

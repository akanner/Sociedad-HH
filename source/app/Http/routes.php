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


/**
 * =============================
 * ========= FRONT END =========
 * =============================
 */

/* Páginas estáticas */
Route::get('/', 'StaticPagesController@home');
Route::get('home', 'StaticPagesController@home');
Route::get('autoridades', 'StaticPagesController@autoridades');
Route::get('contacto', 'StaticPagesController@contacto');

/* Encuestas */
Route::get('encuestas','QuestionnaireController@listAll');
Route::get('encuestas/{id}','QuestionnaireController@details');
Route::post('encuestas/enviarCuestionario','QuestionnaireController@completeQuestionnaire');

/* Contacto */
Route::post('contacto/enviar', 'ContactController@sendEmail');

/**
 * =============================
 * ========= BACK END ==========
 * =============================
 */

/* Authentication */
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

/* Encuestas */
Route::get('adminhh',['middleware' => 'auth', 'uses'=>'Backend\DashboardController@show']);
Route::get('adminhh/encuestas', ['middleware' => 'auth', 'uses'=>'Backend\QuestionnaireBackendController@listAll']);
Route::get('adminhh/encuestas/nueva', ['middleware' => 'auth', 'uses'=>'Backend\QuestionnaireBackendController@add']);
Route::post('adminhh/encuestas/nueva/guardar', ['middleware' => 'auth', 'uses'=> 'Backend\QuestionnaireBackendController@save']);
Route::get('adminhh/encuestas/reporte/{id}', ['middleware' => 'auth', 'uses'=>'Backend\QuestionnaireBackendController@report']);

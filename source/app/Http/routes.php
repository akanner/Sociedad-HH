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

/* Email */
Route::post('contacto/enviar', 'EmailController@sendEmail');

/**
 * =============================
 * ========= BACK END ==========
 * =============================
 */

/* Encuestas */
Route::get('adminhh', 'Backend\DashboardController@show');
Route::get('adminhh/encuestas', 'Backend\QuestionnaireBackendController@listAll');
Route::get('adminhh/encuestas/nueva', 'Backend\QuestionnaireBackendController@add');

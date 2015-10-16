<?php

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
Route::get('adminhh',['middleware' => 'auth', 'uses'=>'Backend\QuestionnaireBackendController@listAll']);
Route::get('adminhh/encuestas', ['middleware' => 'auth', 'uses'=>'Backend\QuestionnaireBackendController@listAll']);
Route::get('adminhh/encuestas/nueva', ['middleware' => 'auth', 'uses'=>'Backend\QuestionnaireBackendController@add']);
Route::get('adminhh/encuestas/invitar/{id}',['niddkeware' => 'auth','uses' => 'Backend\QuestionnaireBackendController@invite']);
Route::post('adminhh/encuestas/nueva/guardar', ['middleware' => 'auth', 'uses'=> 'Backend\QuestionnaireBackendController@save']);
//Route::get('adminhh/encuestas/reporte/{id}', ['middleware' => 'auth', 'uses'=>'Backend\QuestionnaireBackendController@report']);
Route::get('adminhh/encuestas/reporte/{id}', ['middleware' => 'auth', 'uses'=>'Backend\QuestionnaireBackendController@basicReport']);
Route::post('adminhh/encuestas/flagQuestionnaireAs',['middleware' => 'auth', 'uses'=>'Backend\QuestionnaireBackendController@flagQuestionnaireAs']);

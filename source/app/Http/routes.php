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
use App\Models\SurveyRespondent;
use App\Models\UserAnswer;

/* Páginas estáticas */
Route::get('/', 'StaticPagesController@index');
Route::get('home', 'StaticPagesController@index');

Route::get('test/', function()
{
  $survey = new SurveyRespondent();
  $survey->setEmail('test');
  $survey->save();
  $response = new UserAnswer();
  $response->setAnswer("opcion a");
  $survey->addUserAnswer($response);
  echo $survey->toJson();
});

Route::get('env/',function()
{
  echo App::environment();
});

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
use App\Models\Survey;
use App\Utils\PrettyJson;

/* Páginas estáticas */
Route::get('/', 'StaticPagesController@index');
Route::get('home', 'StaticPagesController@index');

Route::get('test/', function()
{

  $surveyRespondent =UserAnswer::with('survey','respondent','question')->where("id","=",21)->first();

  echo PrettyJson::printPrettyJson($surveyRespondent->toJson());
});

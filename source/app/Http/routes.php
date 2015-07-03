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
use App\Models\Question;
use App\Models\MultipleChoiceOptionQuestion;
use App\Utils\PrettyJson;


/* Páginas estáticas */
Route::get('/', 'StaticPagesController@home');
Route::get('home', 'StaticPagesController@home');

Route::get('test/', function()
{

  $survey =Survey::where("id","=",1)->with(array("questions"))->first();
  echo PrettyJson::printPrettyJson($survey->toJson());

  foreach ($survey->getQuestions() as $question)
  {
      echo $question->whoami() . "</br>";
  }
});

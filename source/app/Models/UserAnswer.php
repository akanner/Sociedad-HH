<?php

namespace App\Models;

use App\Models\HierarchicalModel;
use App\Models\Survey;
use App\Models\SurveyRespondent;
use App\Models\Question;
/**
 * Represents a SurveyRespondent´s answer to a specific question
 * a survey respondent has only one UserAnswer per question unless the question is a multiple choice with many valid answers,
 * in that case the respondent may have multiple answers for a question
 *
 * Properties
 *  answer  ::string  represents the user´s answer for a question in a survey
 *
 */
class UserAnswer extends HierarchicalModel
{

  //table´s name
  protected $table = 'user_answers';
  //name of the root class of the hierachy
  protected $stiBaseClass = "App\\Models\\UserAnswer";
  protected $fillable = array('answer');

  public function getAnswer()
  {
    return $this->answer;
  }

  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }

  public function setSurvey($survey)
  {
    $this->survey()->associate($survey);
  }

  public function getSurvey()
  {
    return $this->forSurvey()->get();
  }

  public function setRespondent($respondent)
  {
    $this->respondent()->associate($survey);
  }

  public function getRespondent()
  {
    return $this->respondent()->get();
  }

  public function setQuestion($question)
  {
    $this->question()->associate($question);
  }

  public function getQuestion()
  {
    return $this->question()->get();
  }





  public function respondent()
  {
    return $this->belongsTo('App\Models\SurveyRespondent');
  }

  public function survey()
  {
    return $this->belongsTo('App\Models\Survey');
  }


  public function question()
  {
    return $this->belongsTo("App\Models\Question");
  }

}

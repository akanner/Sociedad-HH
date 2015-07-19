<?php

namespace App\Models;

use App\Models\HierarchicalModel;
use App\Models\Questionnaire;
use App\Models\QuestionnaireRespondent;
use App\Models\Question;
/**
 * Represents a QuestionnaireRespondent´s answer to a specific question
 * a questionnaire respondent has only one UserAnswer per question unless the question is a multiple choice with many valid answers,
 * in that case the respondent may have multiple answers for a question
 *
 * Properties
 *  answer  ::string  represents the user´s answer for a question in a questionnaire
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

  public function setQuestionnaire($questionnaire)
  {
    $this->questionnaire()->associate($questionnaire);
  }

  public function getQuestionnaire()
  {
    return $this->forQuestionnaire()->get();
  }

  public function setRespondent($respondent)
  {
    $this->respondent()->associate($questionnaire);
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
    return $this->belongsTo('App\Models\QuestionnaireRespondent');
  }

  public function questionnaire()
  {
    return $this->belongsTo('App\Models\Questionnaire');
  }


  public function question()
  {
    return $this->belongsTo("App\Models\Question");
  }

}

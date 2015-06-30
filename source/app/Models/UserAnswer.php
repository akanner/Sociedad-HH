<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Survey;
use App\Models\SurveyRespondent;
use App\Models\TextQuestion;
/**
 * Represents a SurveyRespondent´s answer to a specific question
 * a survey respondent has only one UserAnswer per question unless the question is a multiple choice with many valid answers,
 * in that case the respondent may have multiple answers for a question
 *
 * Properties
 *  answer  ::string  represents the user´s answer for a question in a survey
 *
 */
class UserAnswer extends Model
{

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
    $this->forSurvey()->associate($survey);
  }

  public function getSurvey()
  {
    return $this->forSurvey();
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
      return $this->belongsTo("App\Models\TextQuestion");
    }
}

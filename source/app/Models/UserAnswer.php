<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
  public function getAnswer()
  {
    return $this->answer;
  }

  public function setAnswer($answer)
  {
    $this->answer = $answer;
  }

  public function respondent()
  {
    $this->belongsTo('App\Models\SurveyRespondent');
  }
}

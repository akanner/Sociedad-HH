<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents a person who has responded to a survey
 *
 */
class SurveyRespondent extends Model
{
    protected $with = array('userAnswers');
    //table´s name
    protected $table="survey_respondents";

    public function userAnswers()
    {
      return $this->hasMany("App\Models\UserAnswer");
    }

    public function email()
    {
        return $this->hasOne('App\Models\Email');
    }

    public function getEmail()
    {
        return $this->email()->get();
    }

    /**
     * Adds an answer to this survey respondent
     *
     * @param UserAnswer $userAnswer a new answer of the survey respondent
     */
    public function addUserAnswer(UserAnswer $userAnswer)
    {
      $this->userAnswers()->save($userAnswer);
    }
}

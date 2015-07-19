<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents a person who has responded to a questionnaire
 *
 */
class QuestionnaireRespondent extends Model
{
    protected $with = array('userAnswers');
    //table´s name
    protected $table="questionnaire_respondents";

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
     * Adds an answer to this questionnaire respondent
     *
     * @param UserAnswer $userAnswer a new answer of the questionnaire respondent
     */
    public function addUserAnswer(UserAnswer $userAnswer)
    {
      $this->userAnswers()->save($userAnswer);
    }
}

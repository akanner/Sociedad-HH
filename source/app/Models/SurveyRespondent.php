<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents a person who has responded to a survey
 *
 * Properties
 *  email ::string  the email of the survey respondent
 */
class SurveyRespondent extends Model
{
    protected $with = array('userAnswers');
    //table´s name
    protected $table="survey_respondents";
    //these fields can be modified
    protected $fillable = array("email");

    public function getEmail()
    {
      return $this->email;
    }

    public function setEmail($email)
    {
      $this->email = $email;
    }

    public function userAnswers()
    {
      return $this->hasMany("App\Models\UserAnswer");
    }
    /**
     * Adds an answer to this survey respondent
     *
     * @param UserAnswer $userAnswer  a new answer of the survey respondent
     */
    public function addUserAnswer(UserAnswer $userAnswer)
    {
      $this->userAnswers()->save($userAnswer);
    }
}

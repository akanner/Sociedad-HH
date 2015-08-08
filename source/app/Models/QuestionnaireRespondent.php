<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Represents a person who has responded to a questionnaire
 *
 */
class QuestionnaireRespondent extends Model
{
    protected $with = array('userAnswers');
    //table´s name
    protected $table="questionnaire_respondents";

    public $fillable = array("name");

    public function userAnswers()
    {
      return $this->hasMany("App\Models\UserAnswer");
    }

    public function email()
    {
        return $this->hasOne('App\Models\Email');
    }

    public function setEmail(Email $email)
    {
        $this->email()->save($email);
    }

    public function getEmail()
    {
        return $this->email()->get();
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
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

    public static function getQueryToFindUserWithEmail($email)
    {
        $query = static::whereHas('email',
        function($query) use ($email)
        {
            $query->where('address',"=",$email);
        });
        return $query;
    }
    /**
     * returns the first questionnaire respondent where its email is equals to $email or a new one
     */
    public static function findFirstWithEmailOrNew($email)
    {
        $query = self::getQueryToFindUserWithEmail($email);
        $questionnaireRespondent = $query->first();

        if(empty($questionnaireRespondent))
        {
            //creates the email entity
            $emailEntity = new Email();
            $emailEntity->setAddress($email);
            //creates a new questionnaireRespondent
            $questionnaireRespondent = new QuestionnaireRespondent();
            $questionnaireRespondent->save();
            $questionnaireRespondent->setEmail($emailEntity);
        }

        return $questionnaireRespondent;
    }
}

<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

/**
 * This class represents a questionnaire
 *
 * Properties:
 *  title       ::string  The title of the questionnaire
 *  description   ::string  Some description about the questionnaire
 *  activeFrom  ::date    Creation date of the questionnaire
 *  activeTo    ::date    Date when the questionnaire went out of use, will be null if the questionnaire is still in use
 *
 * @author Agustin Ignacio Kanner <agustinkanner@gmail.com>
 */
class Questionnaire extends Model
{

    public $fillable = array('title','description','heading','activeFrom','activeTo','active','locked');

    public static function allActive() {
        return Questionnaire::where("active","=",true)->get();
    }

      public function setTitle($title)
      {
        $this->title = $title;
      }

      public function getTitle()
      {
        return $this->title;
      }

      public function setHeading($heading)
      {
        $this->heading = $heading;
      }

      public function getHeading()
      {
        return $this->heading;
      }

      public function setDescription($description)
      {
        $this->description = $description;
      }

      public function getDescription()
      {
        return $this->description;
      }

      public function getAttachedFilePath()
      {
          return $this->attachedFilePhysicalName;
      }

      public function setAttachedFilePath($filePath)
      {
          $this->attachedFilePhysicalName = $filePath;
      }

      public function getAttachedFileLogicalName()
      {
          return $this->attachedFileLogicalName;
      }

      public function setAttachedFileLogicalName($logicalName)
      {
          $this->attachedFileLogicalName = $logicalName;
      }

      public function setActiveFrom($activeFrom)
      {
        $this->activeFrom = $activeFrom;
      }

      public function getActiveFrom()
      {
        return $this->activeFrom;
      }

      public function setActiveTo($activeTo)
      {
        $this->activeTo = $activeTo;
      }

      public function getActiveTo()
      {
        return $this->activeTo;
      }

      public function setActive($active)
      {
        $this->active = $active;
      }

      public function isActive()
      {
        return $this->active;
      }

      public function setLocked($locked)
      {
        $this->locked = $locked;
      }

      public function isLocked()
      {
        return $this->locked;
      }

      public function getQuestions()
      {
        return $this->questions()->get();
      }

      public function addQuestion($question)
      {
        $this->questions()->save($question);
      }

      public function incrementAnswersCount()
      {
        $this->answersCount+=1;
      }

      public function getAnswersCount()
      {
        return $this->answersCount;
      }

      public function questions()
      {
        return $this->hasMany("App\Models\Question");
      }

    /**
    * Generates the stadistics of the questionnaire
    */
    public function getReport()
    {
      //gets the questions of the questionnaire
      $questions = Question::where("questionnaire_id","=",$this->id)->get();

      $stadistics = [];
      $stadistics['questions'] = $this->getReportFor($questions);
      $stadistics['questionnaire_answersCount'] = $this->getAnswersCount();
      $stadistics['questionnaire_name'] = $this->getTitle();
      return $stadistics;
    }

    public function getReportFor($questions)
    {
      $stadistics = [];
      foreach ($questions as $key => $question) {
          $questionId = $question->id;
          $stadistics[$questionId] = $question->getReportInformation();
      }

      return $stadistics;
    }

}

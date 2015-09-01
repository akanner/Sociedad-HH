<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;

use stdClass;

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

    public $fillable = array('title','description','activeFrom','activeTo');

      public function setTitle($title)
      {
        $this->title = $title;
      }

      public function getTitle()
      {
        return $this->title;
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
          return $this->attachedFile;
      }

      public function setAttachedFilePath($filePath)
      {
          $this->attachedFile = $filePath;
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

      public function getQuestions()
      {
        return $this->questions()->get();
      }

      public function addQuestion($question)
      {
        $this->questions()->save($question);
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

      $stadistics = $this->getReportFor($questions);

      return json_encode($stadistics);
  }

  public function getReportFor($questions)
  {
      $stadistics = [];
      foreach ($questions as $key => $question)
      {
          $questionId = $question->id;

          $stadistics[$questionId] = $this->getReportForQuestion($question);

      }

      return $stadistics;
  }

  public function getReportForQuestion($question)
  {
      $questionInformation = new stdClass();
      //--------------------------------------
      $questionInformation->description = $question->getDescription();
      $questionInformation->options = array();
      //process the users answers
      foreach ($question->getOptions() as $key => $option)
      {
          $optionInformation = new stdClass();
          $optionInformation->description = $option->getDescription();
          $optionInformation->correctAnswer = $option->getIsCorrectAnswer();
          //gets the number of questions responded with the current option
          //--------------------------------------------------------------------
          $optionId = $option->id;
          $optionInformation->answersCount = $question->getAnswers()->filter(
          function($answer) use ($optionId)
          {
              return $answer->getOption()->id == $optionId;
          })->count();
          //--------------------------------------------------------------------

          $questionInformation->options[$optionId] = $optionInformation;
      }

      return $questionInformation;
  }


}

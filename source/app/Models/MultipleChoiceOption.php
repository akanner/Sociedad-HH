<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Represents an option of one multiple choice question
 *
 * Properties:
 *  description   ::string    Description of the option.
 *  isOtherOption ::boolean   Indicates that the option is the "other option" and will be answered with text
 *  question      ::Question  the question which contains this option
 */
class MultipleChoiceOption extends Model
{

  public $fillable = array("description","question_id","is_other_option");

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getIsOtherOption()
  {
    return $this->is_other_option=="1" ? TRUE : FALSE ;
  }

  public function setIsOtherOption($isOtherOption)
  {
    $this->is_other_option = $isOtherOption;
  }

  public function setIsCorrectAnswer($isCorrectAnswer)
  {
      $this->correct_answer = $isCorrectAnswer;
  }

  public function getIsCorrectAnswer()
  {
      return $this->correct_answer=="1" ? TRUE : FALSE;
  }

  public function question()
  {
    return $this->belongsTo("Question");
  }

  public function getQuestion()
  {
    return $this->question->first();
  }

}

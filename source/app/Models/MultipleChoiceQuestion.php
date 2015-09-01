<?php

namespace App\Models;

use App\Models\Question;
use App\Models\MultipleChoiceOption;

/**
 * Represents a multiplechoiceQuestion
 * Properties:
 *  description ::string                        contains the question itself as a text
 *  options     ::array[MultipleChoiceOption]   Array with the multiple options defined for this question
 */
abstract class MultipleChoiceQuestion extends Question
{
  //eager loading of the options, there is no point in a MultipleChoiceQuestion without options
  public $with = "options";

  public function options()
  {
    return $this->hasMany("App\Models\MultipleChoiceOption","question_id");
  }

  public function addOption($option)
  {
    $this->options()->save($option);
  }

  public function getOptions()
  {
    return $this->options()->get();
  }
}

<?php

namespace App\Models;
use App\Models\Question;

/**
 * Represents a multiplechoiceQuestion
 * Properties:
 *  description ::string                        contains the question itself as a text
 *  options     ::array[MultipleChoiceOption]   Array with the multiple options defined for this question
 */
class MultipleChoiceQuestion extends Question
{
  public function whoami()
  {
    return "im a multiple choice question and i have overrided the method whoami(), IM A PERSISTED SUBCLASS!!";
  }
}

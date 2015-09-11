<?php

namespace App\Models;

use App\Models\MultipleChoiceQuestion;

/**
 * Represents a question with only one posible answer.
 */
class MultipleChoiceQuestionSingleOption extends MultipleChoiceQuestion
{
  /**
   * Returns the name of the template that will be rendered in the view
   */
  public function getTemplateName()
  {
    return 'pages.questionnaires.templates.multipleChoiceQuestionSingleOption';
  }

  public function createNewAnswerForMyself($respondent,$answerData)
  {
      // Gets the selected option
      $optionSelected = MultipleChoiceOption::find($answerData['option']);
      // Saves the answer
      $textOtherOption = isset($answerData['text']) ? $answerData['text'] : NULL; // Probably null, i dont care
      $answer = AnsweredWithOption::createNewAnswerFor($respondent,$this->getQuestionnaire(),$this,$optionSelected,$textOtherOption);

      return $answer;
  }
}

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
    return 'pages.surveys.templates.multipleChoiceQuestionSingleOption';
  }
}

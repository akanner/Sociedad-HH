<?php

namespace App\Models;

use App\Models\MultipleChoiceQuestion;
/**
 *
 */
class MultipleChoiceQuestionMultipleOptions extends MultipleChoiceQuestion
{
  /**
   * Returns the name of the template that will be rendered in the view
   */
  public function getTemplateName()
  {
    return 'pages.surveys.templates.multipleChoiceQuestionMultipleOptions';
  }
}

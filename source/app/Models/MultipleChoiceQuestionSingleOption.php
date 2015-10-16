<?php

namespace App\Models;

use App\Models\MultipleChoiceQuestion;

use stdClass;

/**
 * Represents a question with only one posible answer.
 */
class MultipleChoiceQuestionSingleOption extends MultipleChoiceQuestion
{
    /**
    * Returns the name of the template that will be rendered in the view
    */
    public function getTemplateName() {
        return 'pages.questionnaires.templates.multipleChoiceQuestionSingleOption';
    }

    public function getReportTemplateName()
    {
        return 'pages.questionnaires.templates.multipleChoiceQuestionSingleOptionTextReport';
    }

    public function createNewAnswerForMyself($respondent,$answerData) {
        // Gets the selected option
        $optionSelected = MultipleChoiceOption::find($answerData['option']);
        // Saves the answer
        $textOtherOption = isset($answerData['text']) ? $answerData['text'] : NULL; // Probably null, i dont care
        $answer = AnsweredWithOption::createNewAnswerFor($respondent,$this->getQuestionnaire(),$this,$optionSelected,$textOtherOption);

        return $answer;
    }

    public function getReportInformation() {
        $questionInformation = new stdClass();
        //--------------------------------------
        $questionInformation->description = $this->getDescription();
        $questionInformation->options = array();

        //process the users answers
        foreach ($this->getOptions() as $key => $option) {
            $optionInformation = new stdClass();
            $optionInformation->description = $option->getDescription();
            $optionInformation->correctAnswer = $option->getIsCorrectAnswer();
            //gets the number of questions responded with the current option
            //--------------------------------------------------------------------
            $optionId = $option->id;
            $optionInformation->answersCount = $this->getAnswers()->filter(
            function($answer) use ($optionId)
            {
              return $answer->getOption()->id == $optionId;
            })->count();
            //--------------------------------------------------------------------

            $questionInformation->options[$optionId] = $optionInformation;
            $questionInformation->reportTemplate = $this->getReportTemplateName();
        }

        return $questionInformation;
    }
}

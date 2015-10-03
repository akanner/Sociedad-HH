<?php

namespace App\Models;

use App\Models\Question;

use stdClass;

/**
 * Represents a question with subquestions with only one answer each.
 */
class MultipleSelectionQuestion extends Question {

    public $with = "subquestions";

    public function subquestions() {
        return $this->hasMany("App\Models\MultipleSelectionSubquestion","question_id");
    }

    public function getSubquestions() {
        return $this->subquestions()->get();
    }

    public function addSubquestion($subquestion) {
        $this->subquestions()->save($subquestion);
    }

    public function getPossibleAnswers() {
        return $this->multiple_selection_answers;
    }

    public function getDecodedPossibleAnswers() {
        return json_decode($this->getPossibleAnswers());
    }

    public function getTemplateName() {
        return 'pages.questionnaires.templates.multipleSelectionQuestion';
    }

    public function createNewAnswerForMyself($respondent,$answerData) {
        $answers = [];
        foreach ($answerData as $optionId => $answerValue) {
            // Gets the selected option
            $optionSelected = MultipleSelectionOption::find($optionId);
            // Saves the answer
            $answers[] = AnsweredWithSelectionOption::createNewAnswerFor($respondent,$this->getQuestionnaire(),$this,$optionSelected, $answerValue["option"]);
        }

        return $answers;
    }

    public function getReportInformation() {
        return new stdClass();
    }

}

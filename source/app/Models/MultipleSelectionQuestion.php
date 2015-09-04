<?php

namespace App\Models;

use App\Models\Question;

/**
 * Represents a multiple selection question, with several questions inside
 * Properties:
 *  description ::string                        contains the question itself as a text
 *  options     ::array[MultipleChoiceOption]   Array with the multiple options defined for this question
 */
class MultipleSelectionQuestion extends Question {

    public $with = "subquestions";

    public function subquestions() {
        return $this->hasMany("App\Models\MultipleSelectionSubquestion","question_id");
    }

    public function getSubquestions() {
        return $this->options()->get();
    }

    public function addSubquestion($option) {
        $this->options()->save($option);
    }

    public function createNewAnswerForMyself($respondent,$answerData)
    {
        //do nothing
    }

}

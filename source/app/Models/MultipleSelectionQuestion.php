<?php

namespace App\Models;

use App\Models\Question;

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
        return json_decode($this->getPossibleAnswers(), true);
    }

    public function getTemplateName() {
        return 'pages.questionnaires.templates.multipleSelectionQuestion';
    }

}

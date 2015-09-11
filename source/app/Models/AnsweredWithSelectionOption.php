<?php

namespace App\Models;

/**
 * Represents an answer of a MultipleSelectionQuestion
 */
class AnsweredWithSelectionOption extends UserAnswer
{
  public function option()
  {
    return $this->belongsTo("App\Models\MultipleSelectionOption",'multiple_selection_option_id');
  }

  public function getOption()
  {
      return $this->option()->first();
  }

  public function setOption(MultipleSelectionOption $option)
  {
      $this->option()->associate($option);
  }
  /**
   * get the real answer of the user
   *
   * @return string
   */
  public function getAnswer()
  {
    return $this->option()->get()->description;
  }

  //static methods
  /**
   * creates a new answer for a question
   *
   * @param QuestionnaireRespondent A person who has responded the questionnaire
   * @param Questionnaire           The responded questionnaire
   * @param MultipleChoiceOption    the option selected by the user
   * @param string||null            if the option is flagged as "otherOption" this is the value of that answer
   *
   * @return AnsweredWithSelectionOption
   */
  public static function createNewAnswerFor(QuestionnaireRespondent $respondent, Questionnaire $questionnaire, Question $question, MultipleSelectionOption $optionSelected, $answerValue)
  {
      $newAnswer = new AnsweredWithSelectionOption();
      $newAnswer->setAnswer($answerValue);
      $newAnswer->setOption($optionSelected);
      $newAnswer->setRespondent($respondent);
      $newAnswer->setQuestion($question);
      $newAnswer->setQuestionnaire($questionnaire);
      $newAnswer->save();

      return $newAnswer;
  }

}

<?php
namespace App\Models;
/**
 * represents an answer of a multiplechoiceQuestion
 */
class AnsweredWithOption extends UserAnswer
{
  public function option()
  {
    return $this->belongsTo("App\Models\MultipleChoiceOption",'multiple_choice_option_id');
  }

  public function getOption()
  {
      return $this->option()->first();
  }

  public function setOption(MultipleChoiceOption $option)
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
   * @return AnsweredWithOption
   */
  public static function createNewAnswerFor(QuestionnaireRespondent $respondent, Questionnaire $questionnaire,Question $question, MultipleChoiceOption $optionSelected, $textOtherOption=NULL)
  {
      $newAnswer = new AnsweredWithOption();
      $newAnswer->setAnswer($textOtherOption);
      $newAnswer->setOption($optionSelected);
      $newAnswer->setRespondent($respondent);
      $newAnswer->setQuestion($question);
      $newAnswer->setQuestionnaire($questionnaire);
      $newAnswer->save();

      return $newAnswer;
  }

}

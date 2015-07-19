<?php
namespace App\Models;
use App\Models\UserAnswer;
use App\Models\MultipleChoiceOption;
/**
 * represents an answer of a multiplechoiceQuestion
 */
class AnsweredWithOption extends UserAnswer
{
  public function option()
  {
    $this->HasOne("App\Models\MultipleChoiceOption");
  }

  public function getAnswer()
  {
    return $this->option()->get()->description;
  }

  public function setAnswer($answer)
  {
    $this->questionnaire()->associate($answer);
  }

  public function setQuestionnaire($questionnaire)
  {

  }

}

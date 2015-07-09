<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Represents an option of one multiple choice question
 *
 * Properties:
 *  description   ::string  Description of the option.
 *  isOtherOption ::boolean Indicates that the option is the "other option" and will be answered with text
 */
class MultipleChoiceOption extends Model
{

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getIsOtherOption()
  {
    return $this->isOtherOption;
  }

  public function setIsOtherOption($isOtherOption)
  {
    $this->isOtherOption = $isOtherOption;
  }
}

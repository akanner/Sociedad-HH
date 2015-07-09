<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Represents an option of one multiple choice question
 *
 * Properties:
 *  description ::string  description of the option.
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
}

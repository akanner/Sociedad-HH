<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Survey;
/**
 * Represents a survey question
 * Properties:
 *  description ::string  contains the question itself as a text
 */
class TextQuestion extends Model
{
    //

  protected $fillable = array("description");

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getSurvey()
  {
    return $this->survey;
  }

  public function setSurvey($survey)
  {
    return $this->survey->associate($survey);
  }

  public function survey()
  {
    return $this->belongsTo("App/Models/Survey");
  }

}

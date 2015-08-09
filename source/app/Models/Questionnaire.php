<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
/**
 * This class represents a questionnaire
 *
 * Properties:
 *  title       ::string  The title of the questionnaire
 *  description   ::string  Some description about the questionnaire
 *  activeFrom  ::date    Creation date of the questionnaire
 *  activeTo    ::date    Date when the questionnaire went out of use, will be null if the questionnaire is still in use
 *
 * @author Agustin Ignacio Kanner <agustinkanner@gmail.com>
 */
class Questionnaire extends Model
{
  public $fillable = array('title','description','activeFrom','activeTo');

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function getDescription()
  {
    return $this->description;
  }
  public function setActiveFrom($activeFrom)
  {
    $this->activeFrom = $activeFrom;
  }

  public function getActiveFrom()
  {
    return $this->activeFrom;
  }

  public function setActiveTo($activeTo)
  {
    $this->activeTo = $activeTo;
  }

  public function getActiveTo()
  {
    return $this->activeTo;
  }


  public function getQuestions()
  {
    return $this->questions()->get();
  }

  public function questions()
  {
    return $this->hasMany("App\Models\Question");
  }


}

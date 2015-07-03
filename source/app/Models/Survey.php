<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
/**
 * This class represents a survey
 *
 * Properties:
 *  title       ::string  The title of the survey
 *  substract   ::string  Some description about the survey
 *  activeFrom  ::date    Creation date of the survey
 *  activeTo    ::date    Date when the survey went out of use, will be null if the survey is still in use
 *
 * @author Agustin Ignacio Kanner <agustinkanner@gmail.com>
 */
class Survey extends Model
{
  protected $fillable = array('title','substract','activeFrom','activeTo');

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setSubstract($substract)
  {
    $this->substract = $substract;
  }

  public function getSubstract()
  {
    return $this->substract;
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

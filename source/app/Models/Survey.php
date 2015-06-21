<?php

namespace App\Survey;

use Illuminate\Database\Eloquent\Model;

/**
 * This class represents a survey
 *
 * Properties:
 *  title       ::string
 *  substract   ::string
 *  email       ::string
 *  activeFrom  ::date
 *  activeTo    ::date
 *
 */
class Survey extends Model
{
  protected $fillable = array('title','substract','email','activeFrom','activeTo');

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
    $this->substract = $substract
  }

  public function getSubstract()
  {
    return $this->substract;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getEmail()
  {
    return $this->email;
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

}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


/**
 * Overrides methods to make queries in a table with "Single Table" Inheritance strategy
 *
 * @see http://www.colorfultyping.com/single-table-inheritance-in-laravel-4/
 *
 * @author Agustin Ignacio Kanner (i just googled the solution)
 */
class HierarchicalModel extends Model
{

  //name of the subclass in the hierachy (single table hierachy)
  protected $stiClassField = 'class_name';

  public function __construct($attributes = array())
  {
    parent::__construct($attributes);
    if ($this->useSti()) {
      $this->setAttribute($this->stiClassField,get_class($this));
    }
  }

  private function useSti() {
    return ($this->stiClassField && $this->stiBaseClass);
  }

  public function newQuery($excludeDeleted = true)
  {
    $builder = parent::newQuery($excludeDeleted);
    // If I am using STI, and I am not the base class,
    // then filter on the class name.
    if ($this->useSti() && $this->stiBaseClass !== get_class($this))
    {
      $builder->where($this->stiClassField,"=",get_class($this));
    }
    return $builder;
  }

  public function newFromBuilder($attributes = array(), $connection = NULL)
  {
    if ($this->useSti() && $attributes->{$this->stiClassField})
    {
      $class = $attributes->{$this->stiClassField};
      $instance = new $class;
      $instance->exists = true;
      $instance->setRawAttributes((array) $attributes, true);
      return $instance;
    }
    else
    {
      return parent::newFromBuilder($attributes,$connection);
    }
  }
}

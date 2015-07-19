<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * a question can have many pictures to illustrate the user
 */
class Picture extends Model
{
    public $fillable = ['path'];
}

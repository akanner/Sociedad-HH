<?php

namespace App\Models;

use App\Models\HierarchicalModel;
use App\Models\Questionnaire;
use App\Models\Picture;
/**
 * Represents a questionnaire question
 * Properties:
 *  description ::string  contains the question itself as a text
 */
class Question extends HierarchicalModel
{
    //table´s name
    protected $table = 'questions';
    //name of the root class of the hierachy
    protected $stiBaseClass = "App\\Models\\Question";

    public $fillable = array("description","questionnaire_id");

    /**
    * Returns the name of the template that will be rendered in the view
    */
    public function getTemplateName()
    {
        return 'pages.questionnaires.templates.textQuestion';
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getQuestionnaire()
    {
        return $this->questionnaire()->get();
    }

    public function setQuestionnaire(Questionnaire $questionnaire)
    {
        return $this->questionnaire()->associate($questionnaire);
    }

    public function getPictures()
    {
        return $this->pictures()->get();
    }

    public function addPicture(Picture $picture)
    {
        return $this->pictures()->save($pictures);
    }

    public function questionnaire()
    {
        return $this->belongsTo("App\Models\Questionnaire");
    }

    public function pictures()
    {
        return $this->hasMany("App\Models\Picture",'question_id');
    }

    //static methods

    public static function getById($id)
    {
        return static::where("id","=",$id)->first();
    }
}

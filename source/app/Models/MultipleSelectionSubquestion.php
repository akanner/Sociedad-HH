<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultipleSelectionSubquestion extends Model {

    public $with = "options";

    public function options() {
        return $this->hasMany("App\Models\MultipleSelectionOption","subquestion_id");
    }

    public function addOption($option) {
        $this->options()->save($option);
    }

    public function getOptions() {
        return $this->options()->get();
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultipleSelectionOption extends Model {

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

}

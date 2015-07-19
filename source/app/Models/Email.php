<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{

    protected $table = 'users';
    protected $fillable = ['address'];

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }
}

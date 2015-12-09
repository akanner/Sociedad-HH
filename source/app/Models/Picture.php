<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * a question can have many pictures to illustrate the user
 */
class Picture extends Model
{
    public $fillable = ['path'];


    public function getPath()
    {
        //gets the variable called 'uploaded_images_folder' from the app.php file
        return config('app.uploaded_images_folder') ."/". $this->path;
    }


    public function setName($name)
    {
            $this->path = $name;
    }
}

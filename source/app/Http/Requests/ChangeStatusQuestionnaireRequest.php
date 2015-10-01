<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

// http://laravel.com/docs/5.1/validation

/**
 *
 */
class ChangeStatusQuestionnaireRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'questionnaireId' => 'integer',
            'status' => 'boolean'
        ];
    }
}

 ?>

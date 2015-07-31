<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SaveQuestionnaireRequest extends Request
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'fullName' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ];
    }
}

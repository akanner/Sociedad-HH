<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

// http://laravel.com/docs/5.1/validation

class SendEmailRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
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

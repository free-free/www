<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoginValidateRequest extends Request
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
            'email'=>'required',
            'password'=>'required|max:100|min:10',
        ];
    }
     /**
     * Get the custermizing return message format
     *
     * @return array
     */
     public function messages()
     {
        return [
        'email.required'=>'A email is required',
        'password.required'=>'Password is required'
        ];
     }
}

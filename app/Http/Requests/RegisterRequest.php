<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
        $rule = config('common.user.rule');
        return [
            'name' => "required|max:{$rule['name_max']}",
            'email' => "required|email|max:{$rule['email_max']}|unique:users,email,NULL,id,deleted_at,NULL",
            'password' => "required|confirmed|min:{$rule['password_min']}",
            'password_confirmation' => "required|min:{$rule['password_min']}",
        ];
    }
}
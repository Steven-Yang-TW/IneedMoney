<?php

namespace App\Http\Requests;

/**
 * @property mixed password
 */

class AuthRegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required|string|between:2,100',
            'email'                 => 'required|string|email|max:100|unique:users',
            'password'              => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.*'                => 'AUTH.REGISTER.INVALID_NAME',
            'email.*'               => 'AUTH.REGISTER.INVALID_EMAIL',
            'password.*'            => 'AUTH.REGISTER.INVALID_PASSWORD',
            'password_confirmation' => 'AUTH.REGISTER.INVALID_PASSWORD_CONFIRMATION'
        ];
    }
}

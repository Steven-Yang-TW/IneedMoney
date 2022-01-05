<?php

namespace App\Http\Requests;


class AuthLoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => 'required|string',
            'password'  => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.*'       => 'AUTH.LOGIN.INVALID_EMAIL',
            'password.*'    => 'AUTH.LOGIN.INVALID_PASSWORD',
        ];
    }
}

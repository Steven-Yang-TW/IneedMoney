<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
{
    use RequestTrait;

    public function validationData()
    {
        return array_merge($this->all(), $this->route()->parameters);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}

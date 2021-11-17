<?php


namespace App\Http\Requests\Traits;


use App\Http\Resources\ErrorResource;
use Illuminate\Contracts\Validation\Validator;

trait RequestTrait
{
    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->first();

        (new ErrorResource($error))->Response()->throwResponse();
    }
}

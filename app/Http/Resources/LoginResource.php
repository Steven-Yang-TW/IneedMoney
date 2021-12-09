<?php

namespace App\Http\Resources;

use App\Http\Resources\Traits\SuccessResourceTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{

    use SuccessResourceTrait;

    public function toArray($request)
    {
        return [
            'auth' => [
                'type'  => 'Bearer',
                'token' => $this->resource['token'],
            ],
        ];
    }
}

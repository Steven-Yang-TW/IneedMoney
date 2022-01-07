<?php

namespace App\Http\Resources;

use App\Http\Resources\Traits\SuccessResourceTrait;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
{
    use SuccessResourceTrait;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'auth' => [
                'type'      => 'Bearer',
                'status'    => 'success',
                'token'     => $this->resource['token'],
            ],
        ];
    }
}

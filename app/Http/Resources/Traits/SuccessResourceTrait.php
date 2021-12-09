<?php


namespace App\Http\Resources\Traits;


use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

trait SuccessResourceTrait
{
    private $logDriver = 'admin_api_info';

    /**
     * @param $request
     * @return bool[]
     */
    public function with($request)
    {
        return [
            'success' => true,
        ];
    }

    /**
     * @param $request
     * @return mixed
     */
    public function toResponse($request)
    {
        $response = parent::toResponse($request);

        return $response;
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function addMeta(array $attributes = [])
    {
        return $this->additional([
            'meta' => $attributes,
        ]);
    }

    /**
     * @param $resource
     * @return \Illuminate\Support\HigherOrderTapProxy|mixed
     */
    public static function collection ($resource)
    {
        return tap(new AnonymousResourceCollection($resource, static::class), function ($collection) {
            if (property_exists(static::class, 'preserveKeys')) {
                /** @noinspection PhpMethodParametersCountMismatchInspection */
                $collection->preserveKeys = (new static([]))->preserveKeys === true;
            }
        });
    }
}
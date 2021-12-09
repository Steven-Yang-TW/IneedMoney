<?php


namespace App\Http\Resources\Traits;


use App\Supports\TraceInfo;

trait LogTrait
{
    private $exception = null;

    private function saveLog($response)
    {
        $isLogin = auth()->check();

        $route = request()->route();

        $requestParams = request()->all();
        foreach ($requestParams as $key => $param) {
            if (is_object($param)) {
                $className = get_class($param);
            }
        }
        $log = [
            'operator_id' => $isLogin ? auth()->user()->id : '',
            'action' => filled($route) ? $route->getActionMethod() : '',
            'date' => now()->toDateString(),
            'datetime' => now()->toDateTimeString(),

            'http_method' => request()->method(),
            'request_url' => request()->url(),
            'request_params' => $requestParams,
            'response'       => $response->getData(),

            'ip'         => request()->ip(),
            'trace_code' => TraceInfo::getTraceCode(),
            'auth_token' => TraceInfo::getAuthToken(),

            'exception' => $this->formatException(),
        ];
    }

    private function formatException()
    {
    }
}
<?php

namespace App\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    /**
     * Build success response
     * @param $data
     * @param int $code
     * @return JsonResponse
     */
    public function responseSuccess($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    /**
     * Build error response
     * @param $message
     * @param int $code
     * @return JsonResponse
     */
    public function responseError($message, $code = Response::HTTP_OK)
    {
        return response()->json(['error' => $message], $code);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use ApiResponseTrait;

    protected function respondWithToken($token)
    {
        return $this->responseSuccess([
            'access_token'  => $token,
            'type'          => 'bearer',
            'expires_id'    => '2592000',
        ], Response::HTTP_OK);
    }

}

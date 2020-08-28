<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Traits\ApiResponseTrait;
use App\Models\User;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    }

    /**
     * Register for normal user
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request) {
        $rules = [
            'name'          => 'required|string',
            'email'         => 'required|string|email|max:100|unique:users',
            'password'      => 'required|string|min:8',
            'type'          => 'required|integer|in:1,2,3',
            'phone_number'  => 'required|regex:/^[0-9-]+$/',
        ];
        $fields = $request->all();
        $this->validate($request, $rules);
        $fields['password'] = Hash::make($request->input('password'));

        $user = User::create($fields);

        return $this->responseSuccess($user, Response::HTTP_CREATED);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = \auth()->attempt($credentials)) {
            return $this->responseError('Unauthorized', Response::HTTP_UNAUTHORIZED);
        }

        return $this->respondWithToken($token);
    }

}

<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Ogilo\ApiResponseHelpers;

class AuthController extends Controller
{
    use ApiResponseHelpers;
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->validationError($validator);
        }

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $token = $request->user()->createToken($request->token_name);

            return $this->respondWithSuccess([
                'token' => $token->plainTextToken
            ]);
        } else {
            return $this->respondError('Authentication failed');
        }
    }

    function user(Request $request)
    {
        return $request->user();
    }
}

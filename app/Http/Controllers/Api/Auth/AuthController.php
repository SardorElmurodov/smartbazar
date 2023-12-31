<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        Auth::attempt($request->all());

        $user = Auth::user();

        $token = $user->createToken('api')->accessToken;

        return $this->sendResponse(data: ['token' => $token]);
    }
}

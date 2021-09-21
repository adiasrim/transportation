<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Response;

class AuthenticationController extends Controller
{
    protected function responseWithToken($status = 200): JsonResponse
    {
        return $this->responseData([
            'token' => Auth::user()
                ->createToken('app')
                ->plainTextToken
        ], $status);
    }

    public function register(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name'     => 'required|string|min:3|max:35',
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        $data['password'] = Hash::make($data['password']);

        Auth::login(User::create($data));

        return $this->responseWithToken(\Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|min:3|max:35',
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (!Auth::attempt(\Arr::only($data, ['email', 'password']), true)) {
            return $this->responseMessage(trans('auth.failed'), \Symfony\Component\HttpFoundation\Response::HTTP_UNAUTHORIZED);
        };

        return $this->responseWithToken();
    }
}

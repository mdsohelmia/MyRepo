<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Utilities\ProxyRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private ProxyRequest $proxy;

    public function __construct(ProxyRequest $proxyRequest)
    {
        $this->proxy = $proxyRequest;
    }

    /**
     *Login process.
     */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $user = User::where('email', request('email'))->first();

        if (!$user) {
            return $this->sendResponseWithError('This combination does not exists.', $user, 404);
        }

        if (!\Hash::check(request('password'), $user->password)) {
            return $this->sendResponseWithError('This combination does not exists.', $user, 403);
        }

        $resp = $this->proxy->grantPasswordToken($data['email'], $data['password']);

        return response([
            'token' => $resp->access_token,
            'expiresIn' => $resp->expires_in,
            'message' => 'You have been logged in',
        ], 200);
    }

    public function refreshToken()
    {
        $resp = $this->proxy->refreshAccessToken();

        return response([
            'token' => $resp->access_token,
            'expiresIn' => $resp->expires_in,
            'message' => 'Token has been refreshed.',
        ], 200);
    }

    public function logout()
    {
        $token = request()->user()->token();
        $token->delete();

        // remove the httponly cookie
        cookie()->queue(cookie()->forget('refresh_token'));

        return response([
            'message' => 'You have been successfully logged out',
        ], 200);
    }
}

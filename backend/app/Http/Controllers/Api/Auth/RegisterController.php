<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Utilities\ProxyRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * @var \App\Utilities\ProxyRequest
     */
    protected ProxyRequest $proxyRequest;

    public function __construct(ProxyRequest $proxyRequest)
    {
        $this->proxyRequest = $proxyRequest;
    }

    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $resp = $this->proxyRequest->grantPasswordToken(
            $user->email,
            request('password')
        );

        return response([
            'token' => $resp->access_token,
            'expiresIn' => $resp->expires_in,
            'message' => 'Your account has been created',
        ], 201);
    }
}

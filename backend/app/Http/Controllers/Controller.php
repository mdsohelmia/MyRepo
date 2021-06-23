<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponseWithError($message, $data, $code = 400): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => $data,
            'message' => $code,
            'code' => $code,
        ], $code);
    }
}

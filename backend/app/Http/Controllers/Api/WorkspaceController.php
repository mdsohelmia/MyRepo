<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Workspace;

class WorkspaceController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => Workspace::all(),
        ]);
    }
}

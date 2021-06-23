<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectController extends Controller
{
    /**
     * @var \App\Services\ProjectService
     */
    protected ProjectService $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function index()
    {
        try {
            return (new ProjectCollection($this->projectService->projectList()))->additional([
                'success' => true,
                'message' => 'All project',
            ]);
        } catch (\Throwable $exception) {
            return $this->sendResponseWithError($exception->getMessage(), '', $exception->getCode());
        }
    }

    public function store(ProjectCreateRequest $request)
    {
        try {
            return new ProjectResource($this->projectService->create($request->validated()));
        } catch (\Throwable $exception) {
            return $this->sendResponseWithError($exception->getMessage(), '', $exception->getCode());
        }
    }
}

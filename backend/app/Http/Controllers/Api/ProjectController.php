<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Resources\ProjectCollection;
use App\Services\ProjectService;

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

    public function index(): ProjectCollection
    {
        return (new ProjectCollection($this->projectService->projectList()))->additional([
            'success' => true,
            'message' => 'All project',
        ]);
    }

    public function store(ProjectCreateRequest $request)
    {
        return  $this->projectService->create($request->validated());
    }
}

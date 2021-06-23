<?php

namespace App\Services;

use App\Models\Project;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class ProjectService
{
    /**
     * @var \App\Models\Project
     */
    protected Project $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function projectList(): LengthAwarePaginator
    {
        return $this->project->with(['creator', 'workspace'])
            ->where('creator_id', auth()->user()->id)
            ->when(request('search'), function (Builder $query) {
                $query->whereLike(['title', 'status', 'creator.name'], request('search'));
            })->when((request('from_date') && request('to_date')), function (Builder $query) {
                $query->whereDateBetween('created_at', request('from_date'), request('to_date'));
            })
            ->when(request()->has(['field', 'direction']), function (Builder $query) {
                $query->orderBy(request('field'), request('direction'));
            })
            ->orderBy('id', 'desc')
            ->paginate();
    }

    public function create(array $data)
    {
        $members = collect($data['members'])->pluck('id', 'member_id')->toArray();
        $project = $this->project->create([
            'title' => $data['title'],
            'start_date' => $data['start_date'],
            'start_date' => $data['start_date'],
            'deadline' => $data['deadline'],
            'creator_id' => auth()->user()->id,
            'workspace_id' => $data['workspace_id']['id'],
        ]);
        $project->members()->sync($members);

        return $project;
    }
}

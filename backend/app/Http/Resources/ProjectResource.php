<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'start_date'=>$this->start_date->format('Y-m-d H:s'),
            'deadline'=>$this->deadline->format('Y-m-d H:s'),
            'status'=>$this->status,
            'created_at'=>$this->created_at->format('Y-m-d'),
            'creator'=>$this->creator,
            'workspace'=>$this->creator,
        ];
    }
}

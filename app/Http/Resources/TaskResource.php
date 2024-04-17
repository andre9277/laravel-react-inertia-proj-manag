<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            "id"=> $this->id,
            "name"=> $this->name,
            'description' => $this->description,
            'created_at' => (new Carbon($this->created_at))->format('Y-m-d'),
            'status' => $this->status,
            'image_path' => $this->image_path,
            'due_date' => $this->due_date,
            'priority' => $this->priority,
            'project' => new ProjectResource($this->project),
            'assignedUser' => $this->assignedUser ? new UserResource($this->assigned_user) : null,
            'createdBy' => new UserResource($this->createdBy), //returns the User object: this->createdBy
            'updatedBy' => new UserResource($this->updatedBy), //returns the User object: $this->updatedBy
        ];
    }
}

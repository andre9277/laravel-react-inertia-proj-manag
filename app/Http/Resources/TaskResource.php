<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class TaskResource extends JsonResource
{

    public static $wrap = false;
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
            'image_path' => $this->image_path ? Storage::url($this->image_path) : '',
            'project_id' => $this->project_id,
            'due_date' => $this->due_date,
            'priority' => $this->priority,
            'project' => new ProjectResource($this->project),
            'assigned_user_id' => $this->assigned_user_id,
            'assignedUser' => $this->assignedUser ? new UserResource($this->assigned_user) : null,
            'createdBy' => new UserResource($this->createdBy), //returns the User object: this->createdBy
            'updatedBy' => new UserResource($this->updatedBy), //returns the User object: $this->updatedBy
        ];
    }
}

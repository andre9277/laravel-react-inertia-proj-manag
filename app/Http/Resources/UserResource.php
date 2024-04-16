<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //Only returning the fields we want to send to the frontend
        return [
           "id"=> $this->id,
           "name" => $this->name,
           "email" => $this->email,
        ];
    }
}

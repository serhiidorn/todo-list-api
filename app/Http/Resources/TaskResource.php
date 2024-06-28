<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Task */
class TaskResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'status' => $this->status,
            'priority' => $this->priority,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'completed_at' => $this->completed_at,

            'parent' => self::make($this->whenLoaded('parent')),
            'subtasks' => self::collection($this->whenLoaded('subtasks')),
            'descendants' => self::collection($this->whenLoaded('descendants')),
        ];
    }
}

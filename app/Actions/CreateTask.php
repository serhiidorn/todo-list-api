<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\CreateTaskDTO;
use App\Models\Task;

class CreateTask
{
    public function handle(CreateTaskDTO $dto, int $userId): Task
    {
        return Task::create([
            'priority' => $dto->priority,
            'title' => $dto->title,
            'description' => $dto->description,
            'parent_id' => $dto->parentId,
            'user_id' => $userId,
        ]);
    }
}

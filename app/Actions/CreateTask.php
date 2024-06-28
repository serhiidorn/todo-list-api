<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\CreateTaskDTO;
use App\Models\Enums\Status;
use App\Models\Task;

class CreateTask
{
    public function handle(CreateTaskDTO $dto, int $userId): Task
    {
        return Task::create([
            'status' => Status::TODO,
            'priority' => $dto->priority,
            'title' => $dto->title,
            'description' => $dto->description,
            'user_id' => $userId,
        ]);
    }
}

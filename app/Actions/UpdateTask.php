<?php

declare(strict_types=1);

namespace App\Actions;

use App\DTOs\UpdateTaskDTO;
use App\Models\Task;

class UpdateTask
{
    public function handle(UpdateTaskDTO $dto, Task $task): Task
    {
        $task->update([
            'priority' => $dto->priority,
            'title' => $dto->title,
            'description' => $dto->description,
        ]);

        return $task;
    }
}

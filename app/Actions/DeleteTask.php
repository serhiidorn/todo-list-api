<?php

declare(strict_types=1);

namespace App\Actions;

use App\Exceptions\CouldNotDeleteTask;
use App\Models\Task;

class DeleteTask
{
    public function handle(Task $task): bool
    {
        if ($task->isCompleted()) {
            throw CouldNotDeleteTask::because(
                __('The completed task could not be deleted.')
            );
        }

        return $task->delete();
    }
}

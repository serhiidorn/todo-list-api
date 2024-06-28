<?php

declare(strict_types=1);

namespace App\Actions;

use App\Exceptions\CouldNotCompleteTask;
use App\Models\Task;

class CompleteTask
{
    public function handle(Task $task): Task
    {
        if ($task->isCompleted()) {
            throw CouldNotCompleteTask::because(
                __('The task is already completed.')
            );
        }

        if ($task->hasUncompletedSubtasks()) {
            throw CouldNotCompleteTask::because(
                __('The task has uncompleted subtask(s).')
            );
        }

        $task->complete();

        return $task;
    }
}

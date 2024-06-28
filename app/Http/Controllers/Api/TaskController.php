<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\CompleteTask;
use App\Actions\CreateTask;
use App\Actions\UpdateTask;
use App\DTOs\CreateTaskDTO;
use App\DTOs\UpdateTaskDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TaskStoreRequest;
use App\Http\Requests\Api\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Enums\Priority;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(TaskStoreRequest $request, CreateTask $createTask): TaskResource
    {
        $task = $createTask->handle(
            dto: new CreateTaskDTO(
                title: $request->input('title'),
                description: $request->input('description'),
                priority: $request->enum('priority', Priority::class),
                parentId: $request->integer('parent_id')
            ),
            userId: $request->user()->id
        );

        return TaskResource::make($task);
    }

    public function update(TaskUpdateRequest $request, UpdateTask $updateTask, Task $task): TaskResource
    {
        $task = $updateTask->handle(
            dto: new UpdateTaskDTO(
                title: $request->input('title'),
                description: $request->input('description'),
                priority: $request->enum('priority', Priority::class)
            ),
            task: $task
        );

        return TaskResource::make($task);
    }

    public function complete(CompleteTask $completeTask, Task $task): TaskResource
    {
        return TaskResource::make(
            $completeTask->handle($task)
        );
    }
}

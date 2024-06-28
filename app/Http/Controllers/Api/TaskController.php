<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Actions\CreateTask;
use App\DTOs\CreateTaskDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TaskStoreRequest;
use App\Http\Resources\TaskResource;
use App\Models\Enums\Priority;

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
}

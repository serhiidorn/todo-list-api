<?php

declare(strict_types=1);

namespace App\Http\Requests\Api;

use App\Models\Enums\Priority;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class TaskStoreRequest extends FormRequest
{
    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'task_id' => ['nullable', 'exists:tasks,id'],
            'priority' => ['required', new Enum(Priority::class)],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'completed_at' => ['nullable', 'date'],
        ];
    }
}

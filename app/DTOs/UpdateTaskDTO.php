<?php

declare(strict_types=1);

namespace App\DTOs;

use App\Models\Enums\Priority;

readonly class UpdateTaskDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public Priority $priority,
    ) {
    }
}
